<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'ProductName',
        'size_id',
        'color_id',
        'Price',
        'TotalPrice',
                
    ];
}
