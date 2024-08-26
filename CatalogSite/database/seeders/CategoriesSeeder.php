<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        // Clear the categories table
        DB::table('categories')->truncate();

        // Define categories data
        $categories = [
            [
                'parent_id' => null,
                'title' => 'Конвектомати',
                'slug' => 'konvektomati',
                'short_description' => 'Описание на конвектомати',
                'description' => 'Пълно описание на конвектомати',
                'visible' => 1,
                'featured' => 0,
                'position' => 1,
                'menu_icon' => 'icon-konvektomati.png',
                'image' => 'image-konvektomati.jpg',

            ],
            [
                'parent_id' => null,
                'title' => 'Професионални Миялни машини',
                'slug' => 'profesionalni-miialni-mashini',
                'short_description' => 'Описание на професионални миялни машини',
                'description' => 'Пълно описание на професионални миялни машини',
                'visible' => 1,
                'featured' => 0,
                'position' => 2,
                'menu_icon' => 'icon-profesionalni-miialni-mashini.png',
                'image' => 'image-profesionalni-miialni-mashini.jpg',
            ],
            [
                'parent_id' => null,
                'title' => 'Професионални препарати',
                'slug' => 'profesionalni-preparati',
                'short_description' => 'Описание на професионални препарати',
                'description' => 'Пълно описание на професионални препарати',
                'visible' => 1,
                'featured' => 0,
                'position' => 3,
                'menu_icon' => 'icon-profesionalni-preparati.png',
                'image' => 'image-profesionalni-preparati.jpg',
            ],
            [
                'parent_id' => null,
                'title' => 'Препарати за съдомиялни',
                'slug' => 'preparati-za-sudomialni',
                'short_description' => 'Описание на препарати за съдомиялни',
                'description' => 'Пълно описание на препарати за съдомиялни',
                'visible' => 1,
                'featured' => 0,
                'position' => 4,
                'menu_icon' => 'icon-preparati-za-sudomialni.png',
                'image' => 'image-preparati-za-sudomialni.jpg',
            ],
            [
                'parent_id' => null,
                'title' => 'Почистващи препарати',
                'slug' => 'pochistvashti-preparati',
                'short_description' => 'Описание на почистващи препарати',
                'description' => 'Пълно описание на почистващи препарати',
                'visible' => 1,
                'featured' => 0,
                'position' => 5,
                'menu_icon' => 'icon-pochistvashti-preparati.png',
                'image' => 'image-pochistvashti-preparati.jpg',
            ],
            [
                'parent_id' => null,
                'title' => 'Рециклирани машини',
                'slug' => 'reciklirani-mashini',
                'short_description' => 'Описание на рециклирани машини',
                'description' => 'Пълно описание на рециклирани машини',
                'visible' => 1,
                'featured' => 0,
                'position' => 6,
                'menu_icon' => 'icon-reciklirani-mashini.png',
                'image' => 'image-reciklirani-mashini.jpg',
            ],
            [
                'parent_id' => null,
                'title' => 'Рециклирани Конвектомати',
                'slug' => 'reciklirani-konvektomati',
                'short_description' => 'Описание на рециклирани конвектомати',
                'description' => 'Пълно описание на рециклирани конвектомати',
                'visible' => 1,
                'featured' => 0,
                'position' => 7,
                'menu_icon' => 'icon-reciklirani-konvektomati.png',
                'image' => 'image-reciklirani-konvektomati.jpg',
            ],
            [
                'parent_id' => null,
                'title' => 'Рециклирани Съдомиялни',
                'slug' => 'reciklirani-sudomialni',
                'short_description' => 'Описание на рециклирани съдомиялни',
                'description' => 'Пълно описание на рециклирани съдомиялни',
                'visible' => 1,
                'featured' => 0,
                'position' => 8,
                'menu_icon' => 'icon-reciklirani-sudomialni.png',
                'image' => 'image-reciklirani-sudomialni.jpg',
            ],
            [
                'parent_id' => null,
                'title' => 'Омекотители',
                'slug' => 'omekotiteli',
                'short_description' => 'Описание на омекотители',
                'description' => 'Пълно описание на омекотители',
                'visible' => 1,
                'featured' => 0,
                'position' => 9,
                'menu_icon' => 'icon-omekotiteli.png',
                'image' => 'image-omekotiteli.jpg',
            ],
        ];

        // Insert categories data into the database
        DB::table('categories')->insert($categories);

        $subcategories = [
            // Subcategories for "Конвектомати" (id: 1)
            [
                'parent_id' => 1,
                'title' => 'Електрически Конвектомати',
                'slug' => 'elektricheski-konvektomati',
                'short_description' => 'Описание на електрически конвектомати',
                'description' => 'Пълно описание на електрически конвектомати',
                'visible' => 1,
                'featured' => 0,
                'position' => 1,
                'menu_icon' => 'icon-elektricheski-konvektomati.png',
                'image' => 'image-elektricheski-konvektomati.jpg',
            ],
            [
                'parent_id' => 1,
                'title' => 'Газови Конвектомати',
                'slug' => 'gazovi-konvektomati',
                'short_description' => 'Описание на газови конвектомати',
                'description' => 'Пълно описание на газови конвектомати',
                'visible' => 1,
                'featured' => 0,
                'position' => 2,
                'menu_icon' => 'icon-gazovi-konvektomati.png',
                'image' => 'image-gazovi-konvektomati.jpg',
            ],
        
            // Subcategories for "Професионални Миялни машини" (id: 2)
            [
                'parent_id' => 2,
                'title' => 'Подови Миялни машини',
                'slug' => 'podovi-miialni-mashini',
                'short_description' => 'Описание на подови миялни машини',
                'description' => 'Пълно описание на подови миялни машини',
                'visible' => 1,
                'featured' => 0,
                'position' => 1,
                'menu_icon' => 'icon-podovi-miialni-mashini.png',
                'image' => 'image-podovi-miialni-mashini.jpg',
            ],
            [
                'parent_id' => 2,
                'title' => 'Компактни Миялни машини',
                'slug' => 'kompaktni-miialni-mashini',
                'short_description' => 'Описание на компактни миялни машини',
                'description' => 'Пълно описание на компактни миялни машини',
                'visible' => 1,
                'featured' => 0,
                'position' => 2,
                'menu_icon' => 'icon-kompaktni-miialni-mashini.png',
                'image' => 'image-kompaktni-miialni-mashini.jpg',
            ],
        
            // Subcategories for "Професионални препарати" (id: 3)
            [
                'parent_id' => 3,
                'title' => 'Препарати за кухня',
                'slug' => 'preparati-za-kuhnia',
                'short_description' => 'Описание на препарати за кухня',
                'description' => 'Пълно описание на препарати за кухня',
                'visible' => 1,
                'featured' => 0,
                'position' => 1,
                'menu_icon' => 'icon-preparati-za-kuhnia.png',
                'image' => 'image-preparati-za-kuhnia.jpg',
            ],
            [
                'parent_id' => 3,
                'title' => 'Препарати за подове',
                'slug' => 'preparati-za-podove',
                'short_description' => 'Описание на препарати за подове',
                'description' => 'Пълно описание на препарати за подове',
                'visible' => 1,
                'featured' => 0,
                'position' => 2,
                'menu_icon' => 'icon-preparati-za-podove.png',
                'image' => 'image-preparati-za-podove.jpg',
            ],
        
            // Subcategories for "Препарати за съдомиялни" (id: 4)
            [
                'parent_id' => 4,
                'title' => 'Препарати за твърда вода',
                'slug' => 'preparati-za-tvurda-voda',
                'short_description' => 'Описание на препарати за твърда вода',
                'description' => 'Пълно описание на препарати за твърда вода',
                'visible' => 1,
                'featured' => 0,
                'position' => 1,
                'menu_icon' => 'icon-preparati-za-tvurda-voda.png',
                'image' => 'image-preparati-za-tvurda-voda.jpg',
            ],
            [
                'parent_id' => 4,
                'title' => 'Препарати за стъклени съдове',
                'slug' => 'preparati-za-stukleni-sudove',
                'short_description' => 'Описание на препарати за стъклени съдове',
                'description' => 'Пълно описание на препарати за стъклени съдове',
                'visible' => 1,
                'featured' => 0,
                'position' => 2,
                'menu_icon' => 'icon-preparati-za-stukleni-sudove.png',
                'image' => 'image-preparati-za-stukleni-sudove.jpg',
            ],
        
            // Subcategories for "Почистващи препарати" (id: 5)
            [
                'parent_id' => 5,
                'title' => 'Обезмаслители',
                'slug' => 'obezmasliteli',
                'short_description' => 'Описание на обезмаслители',
                'description' => 'Пълно описание на обезмаслители',
                'visible' => 1,
                'featured' => 0,
                'position' => 1,
                'menu_icon' => 'icon-obezmasliteli.png',
                'image' => 'image-obezmasliteli.jpg',
            ],
            [
                'parent_id' => 5,
                'title' => 'Препарати за баня',
                'slug' => 'preparati-za-bania',
                'short_description' => 'Описание на препарати за баня',
                'description' => 'Пълно описание на препарати за баня',
                'visible' => 1,
                'featured' => 0,
                'position' => 2,
                'menu_icon' => 'icon-preparati-za-bania.png',
                'image' => 'image-preparati-za-bania.jpg',
            ],
        
            // Subcategories for "Рециклирани машини" (id: 6)
            [
                'parent_id' => 6,
                'title' => 'Рециклирани Хладилници',
                'slug' => 'reciklirani-hladilnici',
                'short_description' => 'Описание на рециклирани хладилници',
                'description' => 'Пълно описание на рециклирани хладилници',
                'visible' => 1,
                'featured' => 0,
                'position' => 1,
                'menu_icon' => 'icon-reciklirani-hladilnici.png',
                'image' => 'image-reciklirani-hladilnici.jpg',
            ],
            [
                'parent_id' => 6,
                'title' => 'Рециклирани Фурни',
                'slug' => 'reciklirani-furni',
                'short_description' => 'Описание на рециклирани фурни',
                'description' => 'Пълно описание на рециклирани фурни',
                'visible' => 1,
                'featured' => 0,
                'position' => 2,
                'menu_icon' => 'icon-reciklirani-furni.png',
                'image' => 'image-reciklirani-furni.jpg',
            ],
        
            // Subcategories for "Рециклирани Конвектомати" (id: 7)
            [
                'parent_id' => 7,
                'title' => 'Рециклирани Газови Конвектомати',
                'slug' => 'reciklirani-gazovi-konvektomati',
                'short_description' => 'Описание на рециклирани газови конвектомати',
                'description' => 'Пълно описание на рециклирани газови конвектомати',
                'visible' => 1,
                'featured' => 0,
                'position' => 1,
                'menu_icon' => 'icon-reciklirani-gazovi-konvektomati.png',
                'image' => 'image-reciklirani-gazovi-konvektomati.jpg',
            ],
            [
                'parent_id' => 7,
                'title' => 'Рециклирани Електрически Конвектомати',
                'slug' => 'reciklirani-elektricheski-konvektomati',
                'short_description' => 'Описание на рециклирани електрически конвектомати',
                'description' => 'Пълно описание на рециклирани електрически конвектомати',
                'visible' => 1,
                'featured' => 0,
                'position' => 2,
                'menu_icon' => 'icon-reciklirani-elektricheski-konvektomati.png',
                'image' => 'image-reciklirani-elektricheski-konvektomati.jpg',
            ],
        
            // Subcategories for "Омекотители" (id: 9)
            [
                'parent_id' => 9,
                'title' => 'Течни Омекотители',
                'slug' => 'techni-omekotiteli',
                'short_description' => 'Описание на течни омекотители',
                'description' => 'Пълно описание на течни омекотители',
                'visible' => 1,
                'featured' => 0,
                'position' => 1,
                'menu_icon' => 'icon-techni-omekotiteli.png',
                'image' => 'image-techni-omekotiteli.jpg',
            ],
            [
                'parent_id' => 9,
                'title' => 'Сухи Омекотители',
                'slug' => 'suhni-omekotiteli',
                'short_description' => 'Описание на сухи омекотители',
                'description' => 'Пълно описание на сухи омекотители',
                'visible' => 1,
                'featured' => 0,
                'position' => 2,
                'menu_icon' => 'icon-suhni-omekotiteli.png',
                'image' => 'image-suhni-omekotiteli.jpg',
            ],
        ];

        DB::table('categories')->insert($subcategories);
    }
}