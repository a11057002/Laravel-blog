<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;


// Not using
class NewsletterController extends Controller
{
    // single action controller
    public function __invoke(Newsletter $newsletter)
    {
        // ddd($newsletter);
        request()->validate([
            'email' => 'required|email'
        ]);
        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages(['email' => 'email cannot be enrolled']);
        }
        return redirect('/')->with('success', 'You are now signed up for out newsletter!');
    }
}
