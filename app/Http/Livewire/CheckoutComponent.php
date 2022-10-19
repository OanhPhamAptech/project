<?php

namespace App\Http\Livewire;

use Livewire\Component;
use cart;

class CheckoutComponent extends Component
{
  protected $listeners = ['checkout'=>'render'];
  public $CartItems;

  public function render()
  {
   $this->CartItems = \Cart::Content();
   
    return view('livewire.checkout-component')->layout("layouts.base");
  }
}
