<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomepageBox;

class HomepageBoxesSeeder extends Seeder
{
    public function run()
    {
        HomepageBox::create([
            'title' => 'Професионални Конвектомати',
            'link' => 'categories/1/products',
            'image' => 'assets/img/1.png',  // Assuming the image will be stored in 'public/assets/img'
            'position' => 1,
            'visible' => true,
        ]);

        HomepageBox::create([
            'title' => 'Професионални миялни машини',
            'link' => 'categories/2/products',
            'image' => 'assets/img/2.png',
            'position' => 2,
            'visible' => true,
        ]);

        HomepageBox::create([
            'title' => 'Препарати за съдомиялни',
            'link' => 'categories/4/products',
            'image' => 'assets/img/3.png',
            'position' => 3,
            'visible' => true,
        ]);

        HomepageBox::create([
            'title' => 'Професионални препарати',
            'link' => 'categories/3/products',
            'image' => 'assets/img/4.png',
            'position' => 4,
            'visible' => true,
        ]);
    }
}
