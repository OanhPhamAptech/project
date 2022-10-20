<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'Total',
        'phone',
        'address',
        'email',
        'customers_id',
                
    ];
}
