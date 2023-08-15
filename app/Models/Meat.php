<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meat extends Model
{
    use HasFactory;

    protected $table = 'meats';

    protected $fillable = [
        'name',
        'weight',
        'description',
        'status'

    ];


}

