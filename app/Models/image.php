<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $table = 'image';
    protected $fillable = [
        'id',
        'URL',
        'product_id',
        'color_id',

    ];

  
    public function product()
    {
        return $this->belongsToMany('App\Models\color', 'App\Models\product');
    }
    public function color(){
        return $this->belongsTo('App\Models\color');
    }
    public function order_detail()
    {
        return $this->hasManyThrough('App\Models\color','App\Models\order_detail');
    }


}
