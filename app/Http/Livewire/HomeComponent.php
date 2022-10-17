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
    ->join('category', 'product.category_id', '=', 'category.id')
    ->select('product.*', 'size.Price')->where('category.id','=','1')->get();

    $productsSamsung = DB::table('product')
    ->join('size', 'product.id', '=', 'size.product_id')
    ->join('category', 'product.category_id', '=', 'category.id')
    ->select('product.*', 'size.Price')->where('category.id','=','2')->get();

    $productsXiaomi = DB::table('product')
    ->join('size', 'product.id', '=', 'size.product_id')
    ->join('category', 'product.category_id', '=', 'category.id')
    ->select('product.*', 'size.Price')->where('category.id','=','3')->select('*');
    $productsXiaomi = $productsXiaomi->get();

    return view('livewire.home-component', compact('productsApple','productsSamsung','productsXiaomi'))->layout('layouts.base');
  }
}
