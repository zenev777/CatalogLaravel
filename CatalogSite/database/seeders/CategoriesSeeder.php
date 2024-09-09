<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();

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
    }
}