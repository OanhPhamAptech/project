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
        'SizeName',
        'color_id',
        'ColorName',
        'Price',
        'TotalPrice',
                
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\order');
    }
    public function color()
    {
        return $this->belongsTo('App\Models\color');
    }
}
