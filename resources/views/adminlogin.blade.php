<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Xin chào quản lý</title>


    <!-- Fonts -->
   @include('admin_tpl/style')

</head>

<body class="container bg_login">
    <div class="row justify-content-center ">

        <div class="col-xl-10 col-lg-12 col-md-9 ">

            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0 ">
                    <!-- Nested Row within Card Body -->
                    <div class="row ">

                        <div class="col-lg-6 ">

                            <div class=" pt-4">

                                
                                @if (Route::has('login'))
                                <div class="hidden m-4  sm:block " style="text-align: center;">
                                    @auth
                                    <h6>Welcome {{Auth::user()->name}}</h6>
                                    <a href="{{ url('/admin') }}" class="btn btn-primary btn-user">Chuyển tới trang quản lý</a>
                                    @else
                                    <h6 >
                                        Nhấn tiếp tục để chuyển tới trang quản lý, nếu không có tài khoản liên hệ với người quản lý
                                    </h6>

                                    <a href="{{ route('login') }}" class=" btn btn-primary btn-user" >Tiếp tục</a>
                                    

                                    @endauth
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>




    </div>

</body>

</html>