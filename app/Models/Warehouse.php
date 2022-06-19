<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Warehouse extends Model
{
    
    protected $fillable = [
        'id',
        'name',
        'location'
    ];

    public function stores()
    {
        return $this->hasMany(Store::class, 'supplying_warehouse_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'warehouse_stock');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'warehouse_managers');
    }
}


?>