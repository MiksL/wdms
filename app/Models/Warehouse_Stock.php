<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse_Stock extends Model
{
    use HasFactory;
    
    protected $table = 'warehouse_stock';

    protected $fillable = [
        'warehouse_id',
        'product_id',
        'product_count'
    ];
}
