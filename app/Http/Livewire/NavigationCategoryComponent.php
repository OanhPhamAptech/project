<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\category;

class NavigationCategoryComponent extends Component
{
  public function render()
  {
    $category = Category::where('CatStatus','1')->first();

    return view('livewire.navigation-category-component');
  }
}
