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
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    @foreach($categorys as $category)
                    {{$category->CatName}}
                    @endforeach
                </h2>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="box shadow productBox">
                        <a href="">
                            <img src="{{ $product->Featured }}" alt="" class="img-fluid">
                            <div class="detail-box d-flex flex-column justify-content-center align-items-center">
                                <h6 class="fs-6 mt-3">
                                    {{ $product->ProductName }} {{ $product->SizeName }}
                                </h6>
                                <h6>
                                    Price:
                                    <span>
                                        $ {{ $product->Price }}
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
            <nav aria-label="" class="mt-5">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</div>