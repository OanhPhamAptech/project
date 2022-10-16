<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
  // public $id;

  public function mount($size_id)
  {
    $this->size_id = $size_id;
  }
  // public function store($product_id, $product_mame, $product_price)
  // {
  //   Cart::add($product_id, $product_mame, 1, $product_price)->associate('App\Models\Product');
  //   session()->flash('success_message', 'Item added in Cart');
  //   return redirect()->route('product.cart');
  // }

  public function render()
  {
    $size = Size::where('id', $this->size_id)->first();

    $product = $size->product()->where('id', $size->product_id)->get();
    $product = Product::find($size->product_id);

    $colors = Size::find($this->size_id)->color;
    foreach ($colors as $color) {
     $color->img()->get('URL');
    }

    // $popular_products = Product::inRandomOrder()->limit(5)->get();
    // $related_products = Product::where('category_id', $product->categpryid)->inRandomOrder()->limit(5)->get();
    
    return view('livewire.details-component', ['size' => $size, 'product' => $product, 'colors' => $colors])->layout('layouts.base');
  }
}
