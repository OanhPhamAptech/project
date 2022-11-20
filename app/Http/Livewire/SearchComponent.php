<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SearchComponent extends Component
{
  public $product=[];
  public $search;
  public $error = '';
 

 
  public function searchProduct()
  {   $search= $this->search;
   
    dd($search);
  //  return redirect()->route('product.search');
  
  }
  

  public function render()
  {     
   
  
    // // try {
      $product = $this->product = product:: join('size','size.product_id','=','product.id')     
      ->select('product.ProductName','product.Featured', 'size.id','size.SizeName','size.price') 
      ->where('ProductName', 'like', '%' . $this->search . '%')      
      ->get();
     
      // $this->reset(['error']);
      
    // } catch (ModelNotFoundException $e) {
    //   $this->error = 'Product not found.';
    // }
  
  
  return view('livewire.search-component',['product'=>$product])->layout("layouts.base");
}
}