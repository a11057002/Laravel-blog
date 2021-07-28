<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class RegisterService
{
    public function store()
    {
        // if failed redriect to previous page
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required',
        ]);
        $user = User::create($attributes);

        // Auth facades
        auth()->login($user);
    }
}
