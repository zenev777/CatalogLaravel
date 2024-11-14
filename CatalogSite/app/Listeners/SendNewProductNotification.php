<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Mail\NewProductNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
use Mail;

class SendNewProductNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreated $event)
    {
        if (app()->runningInConsole() && !app()->runningUnitTests()) {
            Log::info('Имейл не се изпраща по време на миграция или сийдване.');
            return;
        }

        $product = $event->product;

        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new NewProductNotification($product));
        }
    }
}
