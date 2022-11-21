<div>
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
    <!--payment section-->
    <div class="container mt-2 mb-5">
        <a href="" class="text-black d-flex justify-content-start align-items-center gap-2"><i class="fa fa-chevron-left text-black"></i><span>Chọn thêm</span></a>
        <h4 class="fw-bold mt-2">Thanh toán</h4>
        <form action="#">
            @csrf
            <div class="formBig d-flex justify-content-between row mx-0">
                @error('checkout')
                <div class="formTop mt-2 col-12 alert alert-warning d-flex gap-2 justify-content-left align-items-center">
                    <span class="text-danger">Đang xảy ra lỗi</span> <br>
                </div>
                @enderror
                @if (Session::has('success'))
                <div class="formTop mt-2 col-12 alert alert-warning d-flex gap-2 justify-content-left align-items-center">
                    <div class="alert alert-warning">
                        {{Session::get('success')}}
                    </div>
                </div>
                @endif
                <div class="formLeft p-3 mt-2 box shadow">
                    <p class="fs-5" style="font-weight: 600;">Thông tin khách hàng</p>
                    <input type="radio" name="sex" id="rdoMale">
                    <label for="lblMale">Nam</label>
                    <input type="radio" name="sex" id="rdoFemale" class="ms-2">
                    <label for="lblFemale">Nữ</label><br>
                    <label for="lblName" class="form-label">Họ và tên:</label><br>
                    <input type="text" class="form-control" pattern="[A-za-z]" required wire:model="CusName"><br>
                    <label for="lblPhone" class="form-label">Số điện thoại:</label><br>
                    <input type="text" class="form-control" pattern="[0-9]{9-11}" required wire:model="phone"><br>
                    <label for="lblEmail" class="form-label">Email:</label><br>
                    <input type="text" class="form-control" pattern="[A-za-z]" required wire:model="CusEmail"><br>
                    <p class="fs-5" style="font-weight: 600;">Địa chỉ:</p>
                    <Textarea class="form-control" wire:model="address"></Textarea>
                    <!-- <label for="lblArea" class="form-label">Area:</label><br>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select><br>
                    <label for="lblStore" class="form-label">Store:</label><br>
                    <select class="form-select" aria-label="Default select example">
                        <option selected value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select><br>
                    <input type="checkbox" name="" id="">
                    <span class="ms-1">Issue company invoice</span><br>
                    <p class="mt-2">Notice (Optional)</p>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2"></label>
                    </div> -->
                </div>
                <div class="formRight p-3 mt-2 box shadow">
                    <div class="d-flex justify-content-between">
                        <p class="fs-5" style="font-weight: 600;">Thông tin đơn hàng</p>
                        <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" style="cursor:pointer">Sửa</a>

                        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                            <div class="offcanvas-header d-flex justify-content-end align-items-center">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                @foreach (Cart::Content() as $item)
                                <div class="d-flex justify-content-center align-items-top gap-3 pb-2">

                                    <img src="{{$item->options->image}}" alt="" width="100px" height="100px">
                                    <div class="d-flex flex-column justify-content-center align-items-start">

                                        <span style="font-size: 15px;">{{$item->name}}</span>
                                        <span style="font-size: 15px;">Kích cỡ: {{$item->options->size}} </span>
                                        <span style="font-size: 15px;">Màu: {{$item->options->color}}</span>
                                        <div class="d-flex flex-column">
                                            <span style="font-size: 15px;">Số lượng: {{$item->qty}}</span>
                                            <span style="font-size: 15px;">Giá: {{number_format($item->subtotal)}} VNĐ</span>
                                            <span></span>
                                        </div>
                                    </div>

                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                        </svg>
                                    </a>
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z" />
                                        </svg>
                                    </a>
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </a>
                                </div>
                                @endforeach
                                <hr>
                                <div class="d-flex justify-content-center align-items-center gap-2 py-2">
                                    <span>Tổng: {{Cart::subtotal()}} VNĐ</span>
                                    <span></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center align-items-center gap-2 pt-2">
                                    <a type="button" class="btn btn-primary" style="width:150px" href="/cart">Giỏ hàng</a>
                                    <button type="button" class="btn btn-primary" style="width:150px">Mua ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach (Cart::Content() as $item)
                    <div style="" class="fs-6">
                        <span>{{$item->name}} </span>
                        <br>
                        <span>Kích cỡ: {{$item->options->size}}</span>
                        <br>
                        <span>Màu: {{$item->options->color}}</span>
                        <br>
                        <span>Giá: {{number_format($item->subtotal)}} VNĐ</span>
                    </div>
                    @endforeach
                    <div class="mt-2">
                        <label for="lblDelivery" class="fs-5 mt-2" style="font-weight: 600;">Nhận hàng</label><br>
                        <input type="radio" name="rdoDelivery"><span class="ms-2">Tại cửa hàng</span><br>
                        <input type="radio" name="rdoDelivery" class="mt-2"><span class="ms-2">Tại nhà</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3" style="font-weight: 600;">
                    <span>Tổng:</span>
                    <span>{{Cart::subtotal()}} VNĐ</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show1();" checked><span class="ms-2">Thanh toán bằng 1</span>
                        </div>
                        <div id="box-arrow-top-1" class="box-arrow-top">
                            1
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show2();"><span class="ms-2">Thanh toán bằng 2</span>
                        </div>
                        <div id="box-arrow-top-2" class="box-arrow-top hide">
                            2
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show3();"><span class="ms-2">Thanh toán bằng 3</span>
                        </div>
                        <div id="box-arrow-top-3" class="box-arrow-top hide">
                            3
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show4();"><span class="ms-2">Thanh toán bằng 4</span>
                        </div>
                        <div id="box-arrow-top-4" class="box-arrow-top hide">
                            4
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show5();"><span class="ms-2">Thanh toán bằng 5</span>
                        </div>
                        <div id="box-arrow-top-5" class="box-arrow-top hide">
                            5
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show6();"><span class="ms-2">Thanh toán bằng 6</span>
                        </div>
                        <div id="box-arrow-top-6" class="box-arrow-top hide">
                            6
                        </div>
                    </div>
                    <div class="mt-3">
                        <input type="checkbox" name="" id="">
                        <span>Tôi đã đọc và đồng ý với<a href=""> các điều khoản và điều kiện</a></span>
                    </div>
                    <div class="d-grid gap-2 mt-5">
                        <button class="btn btn-primary" type="submit" wire:click.prevent="save">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--end payment section-->
</div>

<!--get mail-->
<div class="d-flex flex-column align-items-center justify-content-center divGetEmail" style="background-color: #F5F5F5;">
    <h3 class="h3 fw-bold">Đăng ký để nhận thông tin mới từ cửa hàng</h3>
    <p>Thông tin sản phẩm và khuyến mãi mới nhất</p>
    <form action="">
        <div class="divFormEmail">
            <input class="p-3 inpFormEmail" type="text" name="email" id="" placeholder="Email của bạn">
            <button type="submit" class="btn btn-primary p-3 btnFormEmail">Đăng ký</button>
        </div>
    </form>
</div>
<!--end get mail-->
</div>