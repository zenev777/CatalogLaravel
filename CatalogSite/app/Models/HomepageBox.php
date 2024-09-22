<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageBox extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'link', 'image', 'position', 'visible'];

    public $visible;
    
}
