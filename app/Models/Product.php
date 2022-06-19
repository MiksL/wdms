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

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_stock');
    }

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'warehouse_stock');
    }

}


?>