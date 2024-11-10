<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewProductNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $imagePath;

    /**
     * Create a new message instance.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->imagePath = json_decode($product->image_column_name, true)[0] ?? null;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Нов продукт добавен!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'new_product_notification', // Път към изгледа
            with: [
                'title' => $this->product->title,
                'image' => $this->imagePath,
                'price' => $this->product->price,
                'promo_end_date' => $this->product->promo_end_date, // later fix name
                'url' => url('/product/' . $this->product->id)
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
