<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;
use App\Http\Requests;

class PostController extends Controller
{
    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request['body'];
        $request->user()->posts()->save($post);
        return redirect('/');
    }

    public function getDeletePost($postId)
    {
        $post = Post::findOrFail($postId);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->delete();
        alert()->success('Post Deleted', 'Success');
        return redirect('/');
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $post = Post::findOrFail($request['postId']);
        $post->body = $request['body'];
        $post->update();
        
        return response()->json(['new_body' => $post->body], 200);
    }
}
