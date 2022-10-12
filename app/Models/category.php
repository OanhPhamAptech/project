<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'id',        
        'CatName',       
        'CatStatus'
        
    ];

    public function product()
    {
        return $this->hasMany('App\Models\product');
    }

}
