<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartComponent extends Component
{
  public function removeItem($id)
  {

    \Cart::remove($id);
    session()->flash('success_message', 'Item removed');
  }

  public function render()
  {

    $CartItems = \Cart::Content();

    return view('livewire.cart-component')->layout("layouts.base");
  }
  public function removeCart()
  {
    \Cart::destroy();
  }
}
