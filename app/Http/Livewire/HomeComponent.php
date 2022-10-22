<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class HomeComponent extends Component
{
  public function render()
  {
    $productsApple = DB::table('product')
    ->join('size', 'product.id', '=', 'size.product_id')
    ->select('product.ProductName', 'product.Featured', 'product.category_id', 'size.Price', 'size.SizeName')->where('product.category_id','=','1')->take(10)->get();
    
    $productsSamsung = DB::table('product')
    ->join('size', 'product.id', '=', 'size.product_id')
    ->select('product.ProductName', 'product.Featured', 'product.category_id', 'size.Price', 'size.SizeName')->where('product.category_id','=','2')->take(10)->get();
    
    $productsXiaomi = DB::table('product')
    ->join('size', 'product.id', '=', 'size.product_id')
    ->select('product.ProductName', 'product.Featured', 'product.category_id', 'size.Price', 'size.SizeName')->where('product.category_id','=','3')->take(10)->get();
    
    return view('livewire.home-component', compact('productsApple','productsSamsung','productsXiaomi'))->layout('layouts.base');
  }
}
