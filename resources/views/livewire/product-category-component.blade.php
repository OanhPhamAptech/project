<div class="product-category">
  <div class="container">
    <!-- widget categoris -->
    <div class="widget categories-widget">
      <div>
        <h3>Hãng: {{$category_name->CatName}}</h3>
      </div>
      <div class="widget-content">
        <ul class="list-category">
          @foreach ($category as $category)
          <li class="category-item"><a href="{{route('product.product_category',['category_id'=>$category->id])}}" class="cat-link">{{$category->CatName}}</a></li>
          @endforeach
          <li class="category-item"><a href="/shop" class="cat-link" id="clear">Xóa</a></li>
        </ul>
      </div>
    </div>
    <!-- shop section -->
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

    <div class="wrap-pagination-info">

    </div>
  </div>
</div>