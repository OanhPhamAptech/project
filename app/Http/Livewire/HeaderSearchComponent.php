<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Cart;

class HeaderSearchComponent extends Component
{
  public $search;
  public $product_cat;

  public function mount()
  {
    $this->product_cat = "All Category";
    $this->fill(request()->only('search', '$product_cat'));
  }

  use WithPagination;
  public function render()
  {
    $category = Category::all();
    return view('livewire.header-search-component', ['category' => $category])->layout("layouts.base");
  }
}
