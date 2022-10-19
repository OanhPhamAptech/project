<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;

class SearchComponent extends Component
{
  public $sorting;
  public $pagesize;
  public $search;
  public $product_cat;

  public function mount()
  {
    $this->sorting = "default";
    $this->pagesize = 12;
    $this->fill(request()->only('search', '$product_cat'));
  }

  use WithPagination;
  public function render()
  {
    $product = Product::where('ProductName', 'like', '%' . $this->search . '%');

    return view('livewire.search-component', ['product' => $product])->layout("layouts.base");
  }
}
