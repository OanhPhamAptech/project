<div>
  <!--main area-->
  <main id="main" class="main-site">
    <div class="container">
      <div class="wrap-breadcrumb">
        <ul>
          <li class="item-link"><a href="/" class="link">Trang chủ</a></li>
          <li class="item-link"><span>Giỏ hàng</span></li>
        </ul>
      </div>
      <div class=" main-content-area">

        <div class="wrap-iten-in-cart">
          @if (Session::has('success_message'))
          <div class="alert alert-success">
            <strong>Success</strong> {{Session::get('success_message')}}
          </div>
          @endif

          @if (Cart::Content()->count() > 0)
          <h3 class="box-title">Tên sản phẩm</h3>
          <ul class="products-cart">
            @foreach (Cart::Content() as $item)
            <li class="pr-cart-item">
              <div class="product-image">
                <figure><img src="{{$item->options->image}}" alt="img"> </figure>               
              </div>
                         
              <div class="product-name">
                <a class="link-to-product" href="">{{$item->name}}</a>
                <p>Màu : {{$item->options->color}}</p>
                <p>Kích cỡ : {{$item->options->size}}</p>
              </div>
              <div class="d-none  price-field produtc-price">
                <p class="price">{{number_format($item->price)}} VNĐ</p>
              </div>
              <div class="quantity">
                <div class="quantity-input">
                  <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*">
                  <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                  <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                </div>
              </div>
              <div class="price-field sub-total">
                <p class="price">${{$item->subtotal}}</p>
              </div>
              <div class="delete">
                <a href="#" class="btn btn-delete" title="" wire:click.prevent="removeItem('{{$item->rowId}}')">
                  <span>Xóa</span>
                  <i class="fa fa-times-circle" aria-hidden="true"></i>
                </a>
              </div>

            </li>
            @endforeach
          </ul>
          @else
          <p>Không có sản phẩm trong giỏ hàng</p>
          @endif
        </div>


        <div class="summary">
          <div class="row">
            <div class="col-12 col-md-4 order-summary">
              <h4 class="title-box">Thông tin tóm tắt</h4>
              <p class="summary-info"><span class="title">Giá:</span><b class="index">{{Cart::subtotal()}} VNĐ</b></p>
              <p class="summary-info"><span class="title">Thuế:</span><b class="index">{{Cart::tax()}} VNĐ</b></p>
              <p class="summary-info"><span class="title">Giao hàng:</span><b class="index">Miễn phí</b></p>
              <p class="summary-info total-info "><span class="title">Tổng:</span><b class="index">{{Cart::total()}} VNĐ</b></p>
            </div>
            <div class="col-12 col-md-2"></div>
            <div class=" col-12 col-md-3 checkout-info">
              <label class="checkbox-field">
                <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span class="ms-2">Mã giảm giá</span>
              </label>
              <a class="btn btn-checkout" wire:click="checkout" >Thanh toán</a>
              <a class="link-to-shop" href="/shop"  >Tiếp tục mua hàng<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>
            <div class="col-12 col-md-3 update-clear">
              <a class="btn btn-clear" href="#" wire:click.prevent="removeCart">Xóa giỏ hàng</a>
              <a class="d-none btn btn-update" href="#">Cập nhật giỏ hàng</a>
            </div>
          </div>
        </div>
      </div>
      <!--end main content area-->
    </div>
    <!--end container-->

  </main>
  <!--main area-->
</div>