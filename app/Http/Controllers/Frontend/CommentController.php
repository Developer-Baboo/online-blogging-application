<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('status', 'Comment Field is necessary');
            }

            $post = Post::where('slug', $request->post_slug)->where('status', '0')->first();
            if ($post) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('status', 'Commented Successfully');
            } else {
                return redirect()->back()->with('status', 'No Such Post Found');
            }
        } else {
            return redirect('login')->with('status', 'Login First to Comment');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Request $request)
    // {
    //     dd("lsdjf");
    //     if(Auth::check()){
    //         $comment = Comment::where('id', $request->comment_id)
    //                                         ->where('user_id', Auth::user()->id)
    //                                         ->first();
    //         $comment->delete();

    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Comment deleted Successfully'
    //         ]);
    //     }
    // }

    public function destroy(Request $request)
    {
        // dd("lskdjflsd");
        // dd($request);
        if (Auth::check()) {
            // dd("ldsjf");
            $comment = Comment::where('id', $request->comment_id)
                ->where('user_id', Auth::user()->id)
                ->first();
            // dd($comment);

            if ($comment) {
                // dd("Working");
                $comment->delete();

                return response()->json([
                    'status' => 200,
                    'message' => 'Comment deleted successfully'
                ]);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong'
                ]);
            }
        }

        return response()->json([
            'status' => 401,
            'message' => 'Login to Delete this comment'
        ]);
    }
}
