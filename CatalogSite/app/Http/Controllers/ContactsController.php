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

        // Prepare the data
        $name = $validated['name'];
        $phone = $validated['phone'];
        $email = $validated['email'];
        $comentar = $validated['comentar'];

        // Define the HTML content of the email
        $htmlContent = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .email-container { padding: 20px; border: 1px solid #ddd; }
                .email-header { font-size: 18px; font-weight: bold; }
                .email-body { margin-top: 10px; }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>New Contact Form Submission</div>
                <div class='email-body'>
                    <p><strong>Name:</strong> $name</p>
                    <p><strong>Phone:</strong> $phone</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Message:</strong></p>
                    <p>$comentar</p>
                </div>
            </div>
        </body>
        </html>
        ";

        // Send the email
        Mail::html($htmlContent, function ($message) {
            $message->to('zhan.enev@abv.bg')
                ->subject('New Contact Form Submission');
        });

        // Redirect or return a response
        return back()->with('success', 'Your message has been sent!');
    }
}
