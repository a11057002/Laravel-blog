<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Facade\FlareClient\Http\Response;

class UserApiController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts;
        return response()->json($posts, 200);
    }
}
