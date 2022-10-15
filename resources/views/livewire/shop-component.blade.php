<div class="container">
  <h2>Shop Page</h2>

  <!-- widget categoris -->
  <div class="widget categories-widget">
    <h2 class="widget-title">All Category</h2>
    <div class="widget-content">
      <ul class="list-category">
      </ul>
    </div>
  </div>
  <!-- shop section -->
  <div class="row">
    @foreach ($product as $product)
    <div class="col-sm-3 ">
      <div class="card">
        <a href="">
          <div class="img-box">
            <img src="{{asset($product->Featured)}}" alt="">
          </div>
          <div class="card-body">
            <div class="detail-box">
              <h6> {{$product->ProductName}} {{$product->SizeName}}</h6>
              <h6>Price:<span>$</span></h6>
            </div>
            <div class="">
              <a href="#" class="btn btn-success add-to-card" wire:click.prevent="">Thêm vào giỏ hàng</a>
            </div>
            <div class="new">
              <span> New </span>
            </div>
          </div>
        </a>
      </div>
    </div>
    @endforeach
  </div>

  <div class="wrap-pagination-info">

  </div>
</div>