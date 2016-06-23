<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;

class HomeController extends Controller
{
    public function getHome()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('welcome', ['posts' => $posts]);
    }
}
