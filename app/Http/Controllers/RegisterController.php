<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\RegisterService;

class RegisterController extends Controller
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $this->registerService->store();
        // session()->flash('success','Account has been created.'); same as below
        return redirect('/')->with('success','Account has been created.');
    }

}
