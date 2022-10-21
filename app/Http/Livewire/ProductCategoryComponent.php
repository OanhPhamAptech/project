<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class ProductCategoryComponent extends Component
{
  public $sorting;
  public $pagesize;
  public $category_id;

  public function mount($category_id)
  {
    $this->sorting = "default";
    $this->pagesize = 12;
    $this->category_id = $category_id;
  }

  use WithPagination;
  public function render()
  {
    $category = DB::table('category')->where('CatStatus','=', '1')->orderBy('id', 'desc')->select('*');
    $category = $category->get();

    $category_name = Category::where('id',$this->category_id)->first();

    $product = DB::table('product')->where('category_id','=',$this->category_id,'and','ProductStatus', '=', '1')
      ->join('size', 'size.product_id', '=', 'product.id')->select('product.ProductName', 'product.Featured', 'size.id', 'size.SizeName', 'size.price');
    $product = $product->get();
    return view('livewire.product-category-component', ['product' => $product, 'category' => $category, 'category_name' => $category_name])->layout("layouts.base");
  }
}
