<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageBox extends Model
{
    protected $fillable = ['title', 'link', 'image', 'position', 'visible'];
}
