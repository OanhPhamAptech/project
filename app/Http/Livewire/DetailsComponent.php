<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
  // public $id;

  // public function mount($id)
  // {
  //   $this->id = $id;
  // }
  // public function store($product_id, $product_mame, $product_price)
  // {
  //   Cart::add($product_id, $product_mame, 1, $product_price)->associate('App\Models\Product');
  //   session()->flash('success_message', 'Item added in Cart');
  //   return redirect()->route('product.cart');
  // }

  public function render()
  {
    $product = Product::where('id', $this->id)->first();
    $popular_products = Product::inRandomOrder()->limit(5)->get();
    // $related_products = Product::where('category_id', $product->categpryid)->inRandomOrder()->limit(5)->get();
    return view('livewire.datails-component', ['product' => $product])->layout('layouts.base');
  }
}
