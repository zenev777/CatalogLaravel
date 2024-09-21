<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
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

    public function sendInquiry(Request $request, $id)
    {
        // Валидиране на данните
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'message' => 'string',
        ]);

        // Намиране на продукта по ID
        $product = Product::findOrFail($id);

        // Подготовка на данните за имейла
        $data = [
            'product' => $product,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'messageContent' => $request->input('message'),
        ];

        // Изпращане на имейла
        Mail::send('product-inquiry', $data, function ($message) use ($data) {
            $message->to('zhan.enev@abv.bg') // Имейл на администратора
                ->subject('Запитване за продукт: ' . $data['product']->title)
                ->replyTo($data['email']);
        });

        // Пренасочване обратно с успех
        return redirect()->back()->with('success', 'Вашето запитване беше изпратено успешно!');
    }
}
