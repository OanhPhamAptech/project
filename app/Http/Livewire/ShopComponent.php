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

  use WithPagination;
  public function render()
  {
    $category = DB::table('category')->where('CatStatus', '1')->orderBy('id', 'desc')->select('*');
    $category = $category->get();

    $product = DB::table('product')->where('ProductStatus','=','1')
    ->join('size','size.product_id','=','product.id')->select('product.ProductName','product.Featured', 'size.id','size.SizeName','size.price');
    $product = $product->get();
    
    return view('livewire.shop-component', ['product' => $product, 'category'=>$category])->layout("layouts.base");
  }
}
