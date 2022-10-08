<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome Admin</title>


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
                                    <a href="{{ url('/admin') }}" class="btn btn-primary btn-user">Go to Admin Page</a>
                                    @else
                                    <h6 >Click Continue to proceed, if you don't an account, contact your Administrator </h6>

                                    <a href="{{ route('login') }}" class=" btn btn-primary btn-user" >Continue</a>
                                    

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