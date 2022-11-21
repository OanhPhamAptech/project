<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SearchComponent extends Component
{
  public function render(Request $request)
  {
    
    if ($search = $request->search ?? '') {
      $product = Product::where('ProductName', 'like', '%' . $search . '%')
      ->join('size', 'size.product_id', '=', 'product.id')->select('product.ProductName', 'product.Featured', 'size.id', 'size.SizeName', 'size.price');
      $product = $product->get();
      return view('livewire.search-component', compact('product'))->layout("layouts.base");
    }else {
      return view('livewire.search-component')->layout("layouts.base");
    }
  }
}
