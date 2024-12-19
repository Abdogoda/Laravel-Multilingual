<?php

namespace App\Models;

use App\Traits\HasTranslate;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasTranslate;
    
    protected $guarded = [];
    
}