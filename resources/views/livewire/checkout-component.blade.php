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
        <a href="" class="text-black d-flex justify-content-start align-items-center gap-2"><i class="fa fa-chevron-left text-black"></i><span>Choose more</span></a>
        <h4 class="fw-bold mt-2">Payment</h4>
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
                    <p class="fs-5" style="font-weight: 600;">Your information</p>
                    <input type="radio" name="sex" id="rdoMale">
                    <label for="lblMale">Male</label>
                    <input type="radio" name="sex" id="rdoFemale" class="ms-2">
                    <label for="lblFemale">Female</label><br>
                    <label for="lblName" class="form-label">Name:</label><br>
                    <input type="text" class="form-control" pattern="[A-za-z]" required wire:model="CusName"><br>
                    <label for="lblPhone" class="form-label">Phone:</label><br>
                    <input type="text" class="form-control" pattern="[0-9]{9-11}" required wire:model="phone"><br>
                    <label for="lblEmail" class="form-label">Email:</label><br>
                    <input type="text" class="form-control" pattern="[A-za-z]" required wire:model="CusEmail"><br>
                    <p class="fs-5" style="font-weight: 600;">Address</p>
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
                        <p class="fs-5" style="font-weight: 600;">Order detail</p>
                        <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" style="cursor:pointer">Edit</a>

                        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                            <div class="offcanvas-header d-flex justify-content-end align-items-center">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                @foreach (Cart::Content() as $item)
                                <div class="d-flex justify-content-center align-items-center gap-3 pb-2">

                                    <img src="{{$item->options->image}}" alt="" width="100px" height="100px">
                                    <div class="d-flex flex-column justify-content-center align-items-start">

                                        <p class="fs-5">{{$item->name}} {{$item->options->size}} {{$item->options->color}} </p>
                                        <div class="d-flex">
                                            <span>Quantity : {{$item->qty}}</span>
                                            <span>Price : ${{$item->subtotal}}</span>

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
                                    <span>Total : ${{Cart::subtotal()}}</span>
                                    <span></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center align-items-center gap-2 pt-2">
                                    <a type="button" class="btn btn-primary" style="width:150px" href="/cart">View
                                        cart</a>
                                    <button type="button" class="btn btn-primary" style="width:150px">Buy
                                        now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach (Cart::Content() as $item)
                    <div style="font-weight: 600;" class="fs-6">

                        <span>{{$item->name}} </span>
                        -
                        <span>Size : {{$item->options->size}}</span>
                        -
                        <span>Color : {{$item->options->color}}</span>
                        -
                        <span>Amount : ${{$item->subtotal}} </span>

                    </div>
                    @endforeach
                    <p>Total : ${{Cart::subtotal()}}</p>
                    <div class="mt-2">
                        <label for="lblDelivery" class="fs-5 mt-2" style="font-weight: 600;">Delivery</label><br>
                        <input type="radio" name="rdoDelivery"><span class="ms-2">At store</span><br>
                        <input type="radio" name="rdoDelivery" class="mt-2"><span class="ms-2">At home</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3" style="font-weight: 600;">
                        <span>Price:</span>
                        <span>$</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show1();" checked><span class="ms-2">Option 1</span>
                        </div>
                        <div id="box-arrow-top-1" class="box-arrow-top">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus natus fuga
                            quibusdam quaerat. At earum vero explicabo laboriosam perspiciatis atque fuga error
                            voluptates excepturi, est praesentium blanditiis, quia, similique porro!
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show2();"><span class="ms-2">Option
                                2</span>
                        </div>
                        <div id="box-arrow-top-2" class="box-arrow-top hide">
                            Box 2
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show3();"><span class="ms-2">Option
                                3</span>
                        </div>
                        <div id="box-arrow-top-3" class="box-arrow-top hide">
                            Box 3
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show4();"><span class="ms-2">Option
                                4</span>
                        </div>
                        <div id="box-arrow-top-4" class="box-arrow-top hide">
                            Box 4
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show5();"><span class="ms-2">Option
                                5</span>
                        </div>
                        <div id="box-arrow-top-5" class="box-arrow-top hide">
                            Box 5
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start mt-3">
                        <div>
                            <input type="radio" name="rdoBanking" onclick="show6();"><span class="ms-2">Option
                                6</span>
                        </div>
                        <div id="box-arrow-top-6" class="box-arrow-top hide">
                            Box 6
                        </div>
                    </div>
                    <div class="mt-3">
                        <input type="checkbox" name="" id="">
                        <span>I have read and agree to the website's <a href="">terms and conditions</a></span>
                    </div>
                    <div class="d-grid gap-2 mt-5">
                        <button class="btn btn-primary" type="submit" wire:click.prevent="save">Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--end payment section-->
</div>

<!--get mail-->
<div class="d-flex flex-column align-items-center justify-content-center divGetEmail" style="background-color: #F5F5F5;">
    <h3 class="h3 fw-bold">Sign up to receive news from shop</h3>
    <p>Latest product information and promotions</p>
    <form action="">
        <div class="divFormEmail">
            <input class="p-3 inpFormEmail" type="text" name="email" id="" placeholder="Your Email">
            <button type="submit" class="btn btn-primary p-3 btnFormEmail">Subscribe</button>
        </div>
    </form>
</div>
<!--end get mail-->
</div>