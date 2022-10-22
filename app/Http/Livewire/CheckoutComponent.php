<?php

namespace App\Http\Livewire;

use App\Models\customer;
use App\Models\order;
use App\Models\order_detail;
use App\Models\color;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use cart;

class CheckoutComponent extends Component
{
  protected $listeners = ['checkout' => 'render'];
  public $CartItems;
  public $CusName;
  public $CusEmail;
  public $phone;
  public $address;


  public function save()
  {
    if ($this->CusName == null || $this->CusEmail == null || $this->phone == null || $this->address == null) {
      return redirect()->route('checkout')->with('success', 'Please fill up information');
    } {

      $this->CartItems = \Cart::Content();
      DB::beginTransaction();
      try {
        $customer = new customer;
        $customer->name = $this->CusName;
        $customer->email = $this->CusEmail;
        $customer->save();

        $order = new order;
        $order->phone = $this->phone;
        $order->address = $this->address;
        $order->email = $this->CusEmail;
        $order->customers_id = $customer->id;
        $order->Total = \Cart::Subtotal();
        $order->save();

        if (count(\Cart::Content()) > 0) {
          foreach (\Cart::Content() as $item) {
            $order_detail = new order_detail;
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $item->options->idProduct;
            $order_detail->ProductName = $item->name;
            $order_detail->size_id = $item->options->idSize;
            $order_detail->SizeName = $item->options->size;
            $order_detail->color_id = $item->id;
            $order_detail->ColorName = $item->options->color;
            $order_detail->Price = $item->price;
            $order_detail->quantity = $item->qty;
            $order_detail->TotalPrice = $item->subtotal;
            $order_detail->save();

            $colors = color::find($item->id);
            $colors->update([
              'Quantity' => $colors->Quantity - $item->qty,
            ]);
          }
        } 

        DB::commit();
        \Cart::destroy();
      } catch (\Exception $e) {
        DB::rollBack();
        throw $e;
      }
      session()->flash('success_message', 'Bạn đã đặt hàng thành công với mã đơn hàng là ' . $order->id);
      return redirect()->route('product.cart');
    }
  }

  public function render()
  {
    $this->CartItems = \Cart::Content();


    return view('livewire.checkout-component')->layout("layouts.base");
  }
}
