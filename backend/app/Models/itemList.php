<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemList extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'categories',
        'description',
        'price',
        'rent_time',
        'user_id',
        'file_path',
    ];
}
