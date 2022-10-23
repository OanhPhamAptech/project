<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
  // public $id;
  public $ColorID;
  protected $rules = [
    'ColorID' => 'required',
  ];
  public $imagecolor;

  public function mount($size_id)
  {
    $this->size_id = $size_id;
    
  }

  public function store()
  {
    if ($this->ColorID == null) {
      return redirect()->route('product.details', $this->size_id)->with('success', 'Please select color');
    } {
      $size = Size::where('id', $this->size_id)->first();
      $product = $size->product()->where('id', $size->product_id)->get();
      $product = Product::find($size->product_id);
      $color = color::find($this->ColorID);

      \Cart::add([
        'id' => $this->ColorID,
        'name' => $product->ProductName,
        'price' => $size->Price,
        'qty' => 1,
        'options' => array(
          'image' => $color->img()->first()->URL,
          'size' => $size->SizeName,
          'color' => $color->ColorName,
          'idProduct' => $product->id,
          'idSize' => $size->id,
        )
      ]);

      session()->flash('success_message', 'Item added in Cart');
    }
    return redirect()->route('product.cart');
  }


  public function render()
  {
    $size = Size::where('id', $this->size_id)->first();
    $product = $size->product()->where('id', $size->product_id)->get();
    $product = Product::find($size->product_id);
    $colors = Size::find($this->size_id)->color;

    if ($this->ColorID != null) {
      $ColorID = $this->ColorID;
      $ColorID = color::find($this->ColorID);
      $this->imagecolor = $ColorID->img()->first()->URL;     
    }
   

    // popular products
    $popular_products = DB::table('product')->join('size', 'size.product_id', '=', 'product.id')->select();
    $popular_products = $popular_products->inRandomOrder()->limit(5)->get();

    // related product
    $related = DB::table('product')
      ->join('size', 'size.product_id', '=', 'product.id')
      ->join('category', 'category.id', '=', 'product.category_id')
      ->where('category.id', $product->category_id)
      ->select('product.ProductName', 'product.Featured', 'Size.id', 'Size.SizeName', 'Size.Price');
    $related = $related->inRandomOrder()->limit(10)->get();

   

    return view('livewire.details-component', ['size' => $size, 'product' => $product, 'colors' => $colors, 'popular_products' => $popular_products, 'related' => $related])->layout('layouts.base');
  }
}
