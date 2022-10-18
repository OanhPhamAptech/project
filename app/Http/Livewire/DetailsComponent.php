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
  public $ColorID;
  protected $rules = [
    'ColorID' => 'required',
  ];

  public function mount($size_id, $ColorID = null)
  {
    $this->size_id = $size_id;
  }

  public function store($product_id, $size_product, $color_size)
  {
    Cart::add($product_id, $size_product, 1, $color_size)->associate('App\Models\Product');
    session()->flash('success_message', 'Item added in Cart');
    return redirect()->route('product.cart');
    // Cart::add($product_id, $size_product, 1, $color_size)->associate('App\Models\Product');
    // session()->flash('success_message', 'Item added in Cart');
    // return redirect()->route('product.cart');
  }

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
