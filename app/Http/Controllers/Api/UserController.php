<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class UserController extends Controller
{
    public function index(){
        $posts = Post::paginate(6);

        $data = [
            'success' => true,
            'results' => $posts
        ];

        return response()->json($data);
    }
    public function show($slug){
        $post = Post::where('slug', '=', $slug)->first();

        $data = [
            'success' => true,
            'results' => $post
        ];

        return response()->json($data);
    }
}
