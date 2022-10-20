<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SearchComponent extends Component
{
  public $product;
  public $search;
  public $error = '';

  public function searchProduct()
  {
    try {
      $this->product = Product::where('ProductName', 'like', '%'.$this->search .'%')->first();
      $this->reset(['error']);
    } catch (ModelNotFoundException $e) {
      $this->error = 'Product not found.';
    }
    return redirect()->route('product.search');
  }

  public function render()
  {
    return view('livewire.search-component')->layout("layouts.base");
  }
}
