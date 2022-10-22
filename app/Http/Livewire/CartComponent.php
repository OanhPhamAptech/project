<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
  // remove item
  public $CartItems = [];
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
  public function increaseQuantity($rowId)
  {
    $product = Cart::get($rowId);
    $qty = $product->qty + 1;
    Cart::update($rowId, $qty);
  }

  // decrease Quantity
  public function decreaseQuantity($rowId)
  {
    $product = Cart::get($rowId);
    $qty = $product->qty - 1;
    Cart::update($rowId, $qty);
  }
  public function checkout()
  {
    if (count(\Cart::Content()) > 0) {
      $CartItems = \Cart::Content();
      $this->CartItems = $CartItems;
      $this->emit('checkout');
      return redirect()->route('checkout');
    } else {
      session()->flash('success_message', 'Bạn chưa chọn sản phẩm ');
    }
  }
  public function render()
  {

    $CartItems = \Cart::Content();

    return view('livewire.cart-component')->layout("layouts.base");
  }
}
