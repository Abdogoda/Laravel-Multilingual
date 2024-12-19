<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use Translatable;
    
    public $translatedAttributes = ['name', 'category'];
    protected $fillable = ['price'];
}