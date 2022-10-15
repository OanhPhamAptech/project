<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\size;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
  // public $id;

  public function mount($id)
  {
    $this->_id = $id;
  }
  // public function store($product_id, $product_mame, $product_price)
  // {
  //   Cart::add($product_id, $product_mame, 1, $product_price)->associate('App\Models\Product');
  //   session()->flash('success_message', 'Item added in Cart');
  //   return redirect()->route('product.cart');
  // }

  public function render()
  {
    $product = Size::where('id', $this->id)->first();
    // $size = DB::table('size')->join('product','size.product_id','=', $this->product_id)->select('*');
    // $size = $size->get();
    $popular_products = Product::inRandomOrder()->limit(5)->get();
    // $related_products = Product::where('category_id', $product->categpryid)->inRandomOrder()->limit(5)->get();
    return view('livewire.details-component', ['id' =>$product])->layout('layouts.base');
  }
}
