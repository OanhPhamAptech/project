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
                    Smart Watches
                  </h1>
                  <p>
                    Aenean scelerisque felis ut orci condimentum laoreet.
                    Integer nisi nisl, convallis et augue sit amet, lobortis
                    semper quam.
                  </p>
                  <div class="btn-box">
                    <a href="" class="btn1">
                      Contact Us
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
                    Smart Watches
                  </h1>
                  <p>
                    Aenean scelerisque felis ut orci condimentum laoreet.
                    Integer nisi nisl, convallis et augue sit amet, lobortis
                    semper quam.
                  </p>
                  <div class="btn-box">
                    <a href="" class="btn1">
                      Contact Us
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
                    Smart Watches
                  </h1>
                  <p>
                    Aenean scelerisque felis ut orci condimentum laoreet.
                    Integer nisi nisl, convallis et augue sit amet, lobortis
                    semper quam.
                  </p>
                  <div class="btn-box">
                    <a href="" class="btn1">
                      Contact Us
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
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Apple
                </h2>
            </div>
            <div class="row">
                @foreach($productsApple as $productApple)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="box shadow productBox">
                        <a href="">
                            <div class="img-box">
                                <img src="{{ $productApple->Featured }}" alt="">
                            </div>
                            <div class="detail-box d-flex flex-column justify-content-center align-items-center">
                                <h6>
                                    {{ $productApple->ProductName }}
                                </h6>
                                <h6>
                                    Price:
                                    <span>
                                        $ {{ $productApple->Price }}
                                    </span>
                                </h6>
                            </div>
                            <div class="new">
                                <span>
                                    New
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center align-items-center mt-5"><a href="#" class="btn btn-warning fw-bold text-white shadow">View All</a></div>
        </div>
        <div class="container mt-5">
            <div class="heading_container heading_center">
                <h2>
                Samsung
                </h2>
            </div>
            <div class="row">
                @foreach($productsSamsung as $productSamsung)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="box shadow productBox">
                        <a href="">
                            <div class="img-box">
                                <img src="{{ $productSamsung->Featured }}" alt="">
                            </div>
                            <div class="detail-box d-flex flex-column justify-content-center align-items-center">
                                <h6>
                                    {{ $productSamsung->ProductName }}
                                </h6>
                                <h6>
                                    Price:
                                    <span>
                                        $ {{ $productSamsung->Price }}
                                    </span>
                                </h6>
                            </div>
                            <div class="new">
                                <span>
                                    New
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center align-items-center mt-5 "><a href="#" class="btn btn-warning fw-bold text-white shadow">View All</a></div>
        </div>
        <div class="container mt-5">
            <div class="heading_container heading_center">
                <h2>
                Xiaomi
                </h2>
            </div>
            <div class="row">
                @foreach($productsXiaomi as $productXiaomi)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="box shadow productBox">
                        <a href="">
                            <div class="img-box">
                                <img src="{{ $productXiaomi->Featured }}" alt="">
                            </div>
                            <div class="detail-box d-flex flex-column justify-content-center align-items-center">
                                <h6>
                                    {{ $productXiaomi->ProductName }}
                                </h6>
                                <h6>
                                    Price:
                                    <span>
                                        $ {{ $productXiaomi->Price }}
                                    </span>
                                </h6>
                            </div>
                            <div class="new">
                                <span>
                                    New
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center align-items-center mt-5 "><a href="#" class="btn btn-warning fw-bold text-white shadow">View All</a></div>
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
              <h2>
                About Us
              </h2>
            </div>
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have
              suffered alteration
              in some form, by injected humour, or randomised words which don't look even slightly
              believable. If you
              are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
              embarrassing hidden in
              the middle of text. All
            </p>
            <a href="">
              Read More
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
              <h2>
                Contact Us
              </h2>
            </div>
            <form action="">
              <div>
                <input type="text" placeholder="Full Name " />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Phone number" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="d-flex ">
                <button>
                  SEND
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