<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    use HasFactory;
    protected $table = 'color';
    protected $fillable = [
        'id',
        'ColorName',
        'size_id',
        'Quantity',
        
    ];

    public function size()
    {
        return $this->belongsTo('App\Models\size');
    }

    public function img()
    {
        return $this->hasOne('App\Models\image');
    }

    public function order_detail()
    {
        return $this->hasMany('App\Models\order_detail');
    }

}
