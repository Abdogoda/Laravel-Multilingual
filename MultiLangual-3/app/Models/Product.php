<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{

    use HasTranslations;
    
    protected $guarded = [];
    public $translatable = ['name', 'category'];
    
}