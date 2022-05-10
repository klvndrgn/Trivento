<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'item_category',
        'item_model',
        'item_brand',
        'item_image',
        'item_remark',
        'item_quantity'
    ];

    protected $table = 't_item';
}
