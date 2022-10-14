<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;

class ShopComponent extends Component
{
  public $sorting;
  public $pagesize;

  public function mount()
  {
    $this->sorting = "default";
    $this->pagesize = 12;
  }

  // public function store($product_id, $product_mame, $product_price)
  // {
  //   Cart::add($product_id, $product_mame, 1, $product_price)->associate('App\Models\Product');
  //   session()->flash('success_message', 'Item added in Cart');
  //   return redirect()->route('product.cart');
  // }

  use WithPagination;
  public function render()
  {
    $product = DB::table('product')->select('*');
    $product = $product->get();
    return view('livewire.shop-component', ['product' => $product])->layout("layouts.base");
  }
}
