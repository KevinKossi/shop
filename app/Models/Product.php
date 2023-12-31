<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'category_id',
        'weight',
        'meat',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'status',
        'trending',
        'meta_title',
        'meta_keyword',
        'meta_description',

    ];
}
