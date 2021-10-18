<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Warehouse extends Model
{
    use Sortable;
    
    protected $fillable = [
        'id',
        'name',
        'location'
    ];
    
    public $sortable = ['id','name','location'];
}


?>