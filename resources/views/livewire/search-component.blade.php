
<div class="search-component">
<div class="container">
@if(isset($product))
<div class=" row">
    @foreach ($product as $product)
    <div class="col-sm-3 ">
      <div class="card">
        <a href="{{route('product.details',['size_id' => $product->id])}}">
          <div class="img-box">
            <img src="{{asset($product->Featured)}}" alt="">
          </div>
          <div class="card-body">
            <div class="detail-box">
              <h6> {{$product->ProductName}} {{$product->SizeName}}</h6>
              <h6>Price:<span>{{number_format($product->price)}} VNĐ</span></h6>
            </div>
            <div class="new d-none">
              <span> New </span>
            </div>
          </div>
        </a>
      </div>
    </div>
  @endforeach
</div>
@elseif(isset($error))
<p>{{$this->error}}</p>
@else
<p class="error-search">No data to be shown</p>
@endif
</div>
</div>