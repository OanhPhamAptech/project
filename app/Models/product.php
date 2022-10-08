<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'id',
        'ProductName',
        'CatID',
        'ProductDescription',
        'ProductStatus'
        
    ];

    public function size()
    {
        return $this->hasMany('App\Models\size');
    }

    public function cat(){
        return $this->belongsTo('App\Models\category');
    }

    public function color(){
        return $this->hasManyThrough('App\Models\color','App\Models\size');
    }


}
