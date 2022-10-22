<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;

use Livewire\Component;

class CategoryComponent extends Component
{
    public function mount($cat_id)
    {
        $this->cat_id = $cat_id;
    }
    public function render()
    {
        $categorys = DB::table('category')
        ->select('category.CatName')->where('category.id',$this->cat_id)->get();
        $products = DB::table('product')
        ->join('size', 'product.id', '=', 'size.product_id')
        ->select('product.ProductName', 'product.Featured', 'product.category_id', 'size.Price', 'size.SizeName')->where('product.category_id', '=', $this->cat_id)->get();
        return view('livewire.category-component', compact('products','categorys'))->layout("layouts.base");
    }
}
