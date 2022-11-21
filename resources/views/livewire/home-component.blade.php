<div>
  <!-- end header section -->
  <div class="hero_social">
    <a href="">
      <i class="fa fa-facebook" aria-hidden="true"></i>
    </a>
    <a href="">
      <i class="fa fa-twitter" aria-hidden="true"></i>
    </a>
    <a href="">
      <i class="fa fa-linkedin" aria-hidden="true"></i>
    </a>
    <a href="">
      <i class="fa fa-instagram" aria-hidden="true"></i>
    </a>
  </div>
  <!-- slider section -->
  <section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container-fluid ">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box">
                  <h1>
                    Đồng hồ thông minh
                  </h1>
                  <p>
                    Aenean scelerisque felis ut orci condimentum laoreet.
                    Integer nisi nisl, convallis et augue sit amet, lobortis
                    semper quam.
                  </p>
                  <div class="btn-box">
                    <a href="" class="btn1">
                      Liên hệ
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="{{ url('assets/images/slider-img.png')}}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="container-fluid ">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box">
                  <h1>
                    Đồng hồ thông minh
                  </h1>
                  <p>
                    Aenean scelerisque felis ut orci condimentum laoreet.
                    Integer nisi nisl, convallis et augue sit amet, lobortis
                    semper quam.
                  </p>
                  <div class="btn-box">
                    <a href="" class="btn1">
                      Liên hệ
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="{{ url('assets/images/slider-img.png')}}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="container-fluid ">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box">
                  <h1>
                    Đồng hồ thông minh
                  </h1>
                  <p>
                    Aenean scelerisque felis ut orci condimentum laoreet.
                    Integer nisi nisl, convallis et augue sit amet, lobortis
                    semper quam.
                  </p>
                  <div class="btn-box">
                    <a href="" class="btn1">
                      Liên hệ
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="{{ url('assets/images/slider-img.png')}}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ol class="carousel-indicators">
        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
        <li data-target="#customCarousel1" data-slide-to="1"></li>
        <li data-target="#customCarousel1" data-slide-to="2"></li>
      </ol>
    </div>

  </section>
  <!-- end slider section -->
  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container p-0">
      <div class="row">
        <div class="heading_container heading_center">
          <h2>
            Apple
          </h2>
        </div>
        <div class="owl-carousel owl-theme featured-carousel">
          @foreach($productsApple as $productApple)
          <div class="mx-2 card item">
            <a href="{{route('product.details',['size_id' => $productApple->id])}}">
              <div class="">
                <img src="{{ $productApple->Featured }}" alt="" class="img-fluid">
              </div>
              <div class="card-body">
                <div class="detail-box">
                  <h6 class="fs-6 mt-3">
                    {{ $productApple->ProductName }} {{ $productApple->SizeName }}
                  </h6>
                  <h6>
                    Giá:
                    <span>
                      {{number_format($productApple->Price)}} VNĐ
                    </span>
                  </h6>
                </div>
                <div class="new">
                  <span>
                    Mới
                  </span>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      <div class="d-flex justify-content-center align-items-center mt-2"><a href="{{route('product.product_category',['category_id' => $productApple->category_id])}}" class="btn btn-warning fw-bold text-white shadow">Xem tất cả</a></div>
    </div>
    <div class="container mt-5 p-0">
      <div class="row">
        <div class="heading_container heading_center">
          <h2>
            Samsung
          </h2>
        </div>
        <div class="owl-carousel owl-theme featured-carousel">
          @foreach($productsSamsung as $productSamsung)
          <div class="mx-2 card item">
            <a href="{{route('product.details',['size_id' => $productSamsung->id])}}">
              <div class="">
                <img src="{{ $productSamsung->Featured }}" alt="" class="img-fluid">
              </div>
              <div class="card-body">
                <div class="detail-box">
                  <h6 class="fs-6 mt-3">
                    {{ $productSamsung->ProductName }} {{ $productSamsung->SizeName }}
                  </h6>
                  <h6>
                    Giá:
                    <span>
                      {{number_format($productSamsung->Price)}} VNĐ
                    </span>
                  </h6>
                </div>
                <div class="new">
                  <span>
                    Mới
                  </span>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      <div class="d-flex justify-content-center align-items-center mt-1"><a href="{{route('product.product_category',['category_id' => $productSamsung->category_id])}}" class="btn btn-warning fw-bold text-white shadow">Xem tất cả</a></div>
    </div>
    <div class="container mt-5 p-0">
      <div class="row">
        <div class="heading_container heading_center">
          <h2>
            Xiaomi
          </h2>
        </div>
        <div class="owl-carousel owl-theme featured-carousel">
          @foreach($productsXiaomi as $productXiaomi)
          <div class="mx-2 card item">
            <a href="{{route('product.details',['size_id' => $productXiaomi->id])}}">
              <div class="">
                <img src="{{ $productXiaomi->Featured }}" alt="" class="img-fluid">
              </div>
              <div class="card-body">
                <div class="detail-box">
                  <h6 class="fs-6 mt-3">
                    {{ $productXiaomi->ProductName }} {{ $productXiaomi->SizeName }}
                  </h6>
                  <h6>
                    Giá:
                    <span>
                      {{number_format($productXiaomi->Price)}} VNĐ
                    </span>
                  </h6>
                </div>
                <div class="new">
                  <span>
                    Mới
                  </span>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      <div class="d-flex justify-content-center align-items-center"><a href="{{route('product.product_category',['category_id' => $productXiaomi->category_id])}}" class="btn btn-warning fw-bold text-white shadow">Xem tất cả</a></div>
    </div>
  </section>
  <!-- end shop section -->
  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 col-lg-5 ">
          <div class="img-box">
            <img src="img/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6 col-lg-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2 class="text-uppercase">
                Về chúng tôi
              </h2>
            </div>
            <p>
              Chúng tôi là web bán đồng hồ thông minh với tên gọi Timeups.<br>
              Ở đây bạn có thể tìm thấy các mẫu mã đồng hồ mới và đang hot trên thị trường với mức giá tiêu chuẩn.
            </p>
            <a href="">
              Tìm hiểu thêm
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- contact section -->

  <section class="contact_section mb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2 class="text-uppercase">
                Liên hệ
              </h2>
            </div>
            <form action="">
              <div>
                <input type="text" placeholder="Họ và tên" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Số điện thoại" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Tin nhắn" />
              </div>
              <div class="d-flex ">
                <button>
                  GỬI
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="img/contact-img.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->
</div>