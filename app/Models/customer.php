<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'id',
        'name',
        'email',
        
    ];
    public function order()
    {
        return $this->hasMany('App\Models\order');
    }

}
