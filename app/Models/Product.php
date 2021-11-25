<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    
    protected $fillable = [
        'name',
        'price',
        'size',
        'weight'
    ];
    
}


?>