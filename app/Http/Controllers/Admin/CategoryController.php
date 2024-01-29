<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     dd($request);
    // }
    // use Illuminate\Http\Request;

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'navbar_status' => 'required|boolean',
                'status' => 'required|boolean',
            ]);

            // Process the validated data and save to the database
            // Example:
            $slug = Str::slug($validatedData['slug']);
            $category = new Category;
            $category->name = $validatedData['name'];
            $category->slug = $slug;
            $category->description = $validatedData['description'];

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/category/', $filename);
                $category->image = $filename;
            }

            $category->meta_title = $validatedData['meta_title'];
            $category->meta_description = $validatedData['meta_description'];
            $category->meta_keyword = $validatedData['meta_keyword'];

            $category->navbar_status = $validatedData['navbar_status'];
            $category->status = $validatedData['status'];
            $category->created_by = Auth::user()->id;

            $category->save();

            return redirect()->route('category')->with('status', 'Category added successfully');
        } catch (\Exception $ex) {
            // dd($ex);
            return redirect()->route('category')->with('status', 'Something went wrong');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        // dd($category);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($id);
        // dd("kljsdflk");
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'navbar_status' => 'required|boolean',
                'status' => 'required|boolean',
            ]);

            // Process the validated data and save to the database
            // Example:
            $category = Category::find($id);
            $category->name = $validatedData['name'];
            $category->slug = $validatedData['slug'];
            $category->description = $validatedData['description'];

            if ($request->hasFile('image')) {

                $destination = 'uploads/category/' . $category->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }

                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/category/', $filename);
                $category->image = $filename;
            }

            $category->meta_title = $validatedData['meta_title'];
            $category->meta_description = $validatedData['meta_description'];
            $category->meta_keyword = $validatedData['meta_keyword'];

            $category->navbar_status = $validatedData['navbar_status'];
            $category->status = $validatedData['status'];
            $category->created_by = Auth::user()->id;

            $category->save();

            return redirect()->route('category')->with('status', 'Category Updated successfully');
        } catch (\Exception $ex) {
            // Log the exception
            Log::error($ex);

            return redirect()->route('category')->with('status', 'Error: ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $category = Category::find($id);
        if($category){
            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $category->delete();
            return redirect('admin/category')->with('status', 'Category Deleted Successfully');
        }else{
            return redirect('admin/category')->with('status', 'Category Id not found');
        }
    }
}
