<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
  // remove item
  public function removeItem($id)
  {

    \Cart::remove($id);
    session()->flash('success_message', 'Item removed');
  }

  // clear all item
  public function removeCart()
  {
    \Cart::destroy();
  }

  // increase Quantity
  public function increaseQuantity($rowId) {
    $product = Cart::get($rowId);
    $qty = $product->qty + 1;
    Cart::update($rowId,$qty);
  }

  // decrease Quantity
  public function decreaseQuantity($rowId)
  {
    $product = Cart::get($rowId);
    $qty = $product->qty - 1;
    Cart::update($rowId, $qty);
  }

  public function render()
  {

    $CartItems = \Cart::Content();

    return view('livewire.cart-component')->layout("layouts.base");
  }
}
