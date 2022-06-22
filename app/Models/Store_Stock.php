<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store_Stock extends Model
{
    use HasFactory;

    protected $table = 'store_stock';

    protected $fillable = [
        'store_id',
        'product_id',
        'product_count'
    ];
}
