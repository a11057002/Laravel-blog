<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    
    public function show(Post $post)
    {
        return response()->json($post, 200);
    }
}
