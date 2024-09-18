<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactsController extends Controller
{
    public function index()
    {
        return view('contacti');
    }

    public function sendEmail(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'comentar' => 'required|string',
        ]);

        // Send the email
        Mail::send('email', $validated, function ($message) {
            $message->to('zhan.enev@abv.bg')
                ->subject('New Contact Form Submission');
        });

        // Redirect or return a response
        return back()->with('success', 'Your message has been sent!');
    }
}
