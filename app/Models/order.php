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

    public function customer()
    {
        return $this->belongsTo('App\Models\customer');
    }

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }
    public function order_detail()
    {
        return $this->hasMany('App\Models\order_detail');
    }
    

}
