<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Store extends Model
{
    use Sortable;
    
    protected $fillable = [
        'id',
        'name',
        'location',
        'supplying_warehouse_id'
    ];
    
    public $sortable = ['id','name','location', 'supplying_warehouse_id'];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'supplying_warehouse_id');
    }
}


?>