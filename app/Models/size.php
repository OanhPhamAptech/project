<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    use HasFactory;
    protected $table = 'size';
    protected $fillable = [
        'id',
        'SizeName',
        'product_id',
        'SizeDescription',
        'Price'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }
    public function color()
    {
        return $this->hasMany('App\Models\color');
    }

    public function order_detail()
    {
        return $this->hasMany('App\Models\order_detail');
    }

}
