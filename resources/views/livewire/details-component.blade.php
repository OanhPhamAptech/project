<div>
  <!--main area-->
  <main id="main" class="main-site">
    <div class="container">
      <div class="wrap-breadcrumb">
        <ul>
          <li class="item-link"><a href="/" class="link">home</a></li>
          <li class="item-link"><a href="/shop" class="link">Product</a></li>
          <li class="item-link"><span>{{$product->ProductName}} {{$size->SizeName}}</span></li>
        </ul>
      </div>
      @if(session()->has('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
      <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
          <div class="row wrap-product-detail">
            <div class="detail-media">
              <div class="product-gallery">
                <ul class="slides">
                  <li data-thumb="">
                    @if($ColorID==null)
                    <img src="{{asset($product->Featured)}}" alt="{{$product->ProductName}}" />
                    @else
                    <img src="{{asset($imagecolor)}}" alt="{{$product->ProductName}}" />
                    @endif
                  </li>
                </ul>
              </div>
            </div>
            <div class="detail-info">
              <div class="product-rating">            
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <a href="#" class="count-review">(05 review)</a>
              </div>
              <h2 class="product-name"> Name: {{$product->ProductName}} {{$size->SizeName}}</h2>
                <div class="wrap-social">
                  <a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>
                </div>
                <div class="wrap-price">
                  <span class="product-price">Price: ${{number_format($size->Price)}} </span>
                </div>
                <div class="stock-info in-stock">
                  <p class="color">Color: <b></b></p>

                  <div class="color-input">
                    <select wire:model.lazy="ColorID" id="color-option" class="form-select" aria-label="Default select example">
                      <option value="">Please select a Color</option>
                      @foreach ($colors as $color)
                      <option value="{{$color->id}}" required>{{$color->ColorName}}</option>
                      @endforeach

                    </select>
                  </div>
                </div>
                <div class="quantity">

                </div>
                <div class="wrap-butons">
                  <a href="/cart" class="btn add-to-cart" wire:click.prevent="store">Add to Cart</a>
                </div>
              </div>
              <div class="advance-info">
                <div class="tab-control normal">
                  <a href="#description" class="tab-control-item active">description</a>
                </div>
                <div class="tab-contents">
                  <div class="tab-content-item active" id="description">
                    {{$product->ProductDescription}}
                  </div>
                  <div class="tab-content-item" id="review">
                    <div class="wrap-review-form">
                      <div id="comments">
                        <h2 class="woocommerce-Reviews-title">01 review for <span>Radiant-360 R6 Chainsaw Omnidirectional [Orage]</span></h2>
                        <ol class="commentlist">
                          <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                            <div id="comment-20" class="comment_container">
                              <img alt="" src="assets/images/author-avata.jpg" height="80" width="80">
                              <div class="comment-text">
                                <div class="star-rating">
                                  <span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
                                </div>
                                <p class="meta">
                                  <strong class="woocommerce-review__author">admin</strong>
                                  <span class="woocommerce-review__dash">–</span>
                                  <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00">Tue, Aug 15, 2017</time>
                                </p>
                                <div class="description">
                                  <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ol>
                      </div>

                      <div id="review_form_wrapper">
                        <div id="review_form">
                          <div id="respond" class="comment-respond">

                            <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                              <p class="comment-notes">
                                <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                              </p>
                              <div class="comment-form-rating">
                                <span>Your rating</span>
                                <p class="stars">

                                  <label for="rated-1"></label>
                                  <input type="radio" id="rated-1" name="rating" value="1">
                                  <label for="rated-2"></label>
                                  <input type="radio" id="rated-2" name="rating" value="2">
                                  <label for="rated-3"></label>
                                  <input type="radio" id="rated-3" name="rating" value="3">
                                  <label for="rated-4"></label>
                                  <input type="radio" id="rated-4" name="rating" value="4">
                                  <label for="rated-5"></label>
                                  <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                                </p>
                              </div>
                              <p class="comment-form-author">
                                <label for="author">Name <span class="required">*</span></label>
                                <input id="author" name="author" type="text" value="">
                              </p>
                              <p class="comment-form-email">
                                <label for="email">Email <span class="required">*</span></label>
                                <input id="email" name="email" type="email" value="">
                              </p>
                              <p class="comment-form-comment">
                                <label for="comment">Your review <span class="required">*</span>
                                </label>
                                <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                              </p>
                              <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit btn" value="Submit">
                              </p>
                            </form>

                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end main products area-->

          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
            <div class="widget widget-our-services ">
              <div class="widget-content">
                <ul class="our-services">

                  <li class="service">
                    <a class="link-to-service" href="#">
                      <i class="fa fa-truck" aria-hidden="true"></i>
                      <div class="right-content">
                        <b class="title">Free Shipping</b>
                        <p><span class="subtitle">On Oder Over $99</span></p>
                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                      </div>
                    </a>
                  </li>

                  <li class="service">
                    <a class="link-to-service" href="#">
                      <i class="fa fa-gift" aria-hidden="true"></i>
                      <div class="right-content">
                        <b class="title">Special Offer</b>
                        <p><span class="subtitle">Get a gift!</span></p>
                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                      </div>
                    </a>
                  </li>

                  <li class="service">
                    <a class="link-to-service" href="#">
                      <i class="fa fa-reply" aria-hidden="true"></i>
                      <div class="right-content">
                        <b class="title">Order Return</b>
                        <p><span class="subtitle">Return within 7 days</span></p>
                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div><!-- Categories widget-->

            <div class="widget mercado-widget widget-product">
              <h2 class="widget-title">Popular Products</h2>
              <div class="widget-content">
                <ul class="products">
                  @foreach ($popular_products as $p_product)
                  <li class="product-item">
                    <div class="row product product-widget-style">
                      <div class="col-12 col-md-4 thumbnnail">
                        <a href="{{route('product.details',['size_id' => $p_product->id])}}" title="{{$p_product->ProductName}}">
                          <figure><img src="{{asset($p_product->Featured)}}" alt="{{$p_product->ProductName}}"></figure>
                        </a>
                      </div>
                      <div class="col-12 col-md-8 product-info">
                        <a href="{{route('product.details',['size_id' => $p_product->id])}}" title=" {{$p_product->ProductName}}" class="product-name">{{$p_product->ProductName}}</a>
                        <p class="product-price">${{$p_product->Price}}</p>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>

          </div>
          <!--end sitebar-->

          <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="wrap-show-advance-info-box style-1 box-in-site">
              <h3 class="title-box">Related Products</h3>
              <div class="wrap-products">
                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                  @foreach ($related as $r_product)
                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="{{route('product.details',['size_id' => $r_product->id])}}" title="{{$r_product->ProductName}}">
                        <figure><img src="{{asset($r_product->Featured)}}" width="214" height="214" alt="{{$r_product->ProductName}}"></figure>
                      </a>
                      <!-- <div class="group-flash">
                      <span class="flash-item new-label">{{$r_product->id}}</span>
                    </div> -->
                    </div>
                    <div class="product-info">
                      <a href="{{route('product.details',['size_id' => $r_product->id])}}" class="product-name">{{$r_product->ProductName}} {{$r_product->SizeName}}</a>
                      <div class="wrap-price">
                        <p class="product-price">Price: ${{$r_product->Price}}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach

                </div>
              </div>
              <!--End wrap-products-->
            </div>
          </div>
        </div>
        <!--end row-->

      </div>
      <!--end container-->

  </main>
  <!--main area-->
</div>