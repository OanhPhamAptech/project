<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartComponent extends Component
{
  public function removeCart($id){
    \Cart::remove($id);
    session()->flash('success_message', 'Item removed');
  }

  public function render()
  {
    $CartItems = \Cart::getContent();

   
  
    return view('livewire.cart-component')->layout("layouts.base");
  }
}
