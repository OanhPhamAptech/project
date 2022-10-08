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
        'ProductID',
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
}
