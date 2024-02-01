<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
// use App\Models\post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('status', '0')->get();
        return view('admin.post.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'yt_iframe' => 'required|string|max:255',
                'category_id' => 'required|string|max:255',
                'description' => 'nullable|string',
                'slug' => 'required|string|max:25',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'status' => 'nullable',
            ]);

            // Generate slug from the name field
            $slug = Str::slug($validatedData['slug']);

            $post = new Post;
            $post->name = $validatedData['name'];
            $post->yt_iframe = $validatedData['yt_iframe'];
            $post->category_id = $validatedData['category_id'];
            $post->slug = $slug;
            $post->description = $validatedData['description'];
            $post->meta_title = $validatedData['meta_title'];
            $post->meta_description = $validatedData['meta_description'];
            $post->meta_keyword = $validatedData['meta_keyword'];
            $post->status = $validatedData['status'] ?? 0;
            $post->created_by = Auth::user()->id;

            $post->save();

            return redirect()->route('view-post')->with('status', 'Post added successfully');
        } catch (\Exception $ex) {
            // dd($ex);
            return redirect()->route('view-post')->with('status', 'Something went wrong');
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
        $post = Post::find($id);
        $categories = Category::all(); // Fetch all categories
        return view('admin.post.edit', compact('post', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        // dd("kljsdflk");
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'yt_iframe' => 'required|string|max:255',
                'category_id' => 'required|string|max:255',
                'description' => 'nullable|string',
                'slug' => 'required|string|max:25',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'status' => 'nullable',
            ]);

            // dd($validatedData);

            $slug = Str::slug($validatedData['slug']);
            // dd($slug);
            $post = Post::find($id);
            $post->name = $validatedData['name'];
            $post->yt_iframe = $validatedData['yt_iframe'];
            $post->category_id = $validatedData['category_id'];
            $post->slug = $slug;
            // dd($post->slug);
            $post->description = $validatedData['description'];


            $post->meta_title = $validatedData['meta_title'];
            $post->meta_description = $validatedData['meta_description'];
            $post->meta_keyword = $validatedData['meta_keyword'];
            // $post->status =
            $post->status = $validatedData['status'] ?? 0;
            $post->created_by = Auth::user()->id;

            $post->save();

            return redirect()->route('view-post')->with('status', 'Post Updated successfully');
        } catch (\Exception $ex) {
            // Log the exception
            Log::error($ex);

            return redirect()->route('view-post')->with('status', 'Error: ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return redirect('admin/view-post')->with('status', 'Post Deleted Successfully');
        } else {
            return redirect('admin/view-post')->with('status', 'Post Id not found');
        }
    }
}
