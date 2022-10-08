<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    @include('admin_tpl/style')

</head>

<body class="" id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <div class="sidebar-content">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-left" href="">
                    <p><b>Xin chào, {{ Auth::user()->name }}</b> </p>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link " href="/admin/user"><i class="fa-sharp fa-solid fa-users"></i> Quản lý User</a>
                </li>
                <hr class="sidebar-divider">

                <li class="nav-item active">
                    <a class="nav-link " href=""> <i class="fa-solid fa-bars"></i>Quản lý sản phẩm</a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link " href="/admin/order"><i class="fa-regular fa-pen-to-square"></i> Quản lý đơn hàng</a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link " href="/admin/revenu"><i class="fa-solid fa-sack-dollar"></i> Quản lý doanh thu</a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin_tpl/topbar')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Dashboard -->
                    @include('admin_tpl/begin_page')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
                    <div style="overflow:auto;">
                        <a class="btn mr-2" style="float: right; background-color: #3b4a6b; color: rgba(255,255,255,.8)" href="admin/add_prodduct"> Thêm sản phẩm </a>
                    </div>
                    <br>

                    <!-- Product list -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                            <a style="float: right;">Page : {{ $products->currentPage() }} / {{ $products->lastPage() }}</a>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product Name</th>
                                            <th>Brand</th>
                                            <th>Product Picture</th>
                                            <th>Description</th>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th></th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                   
                                        @foreach ($products as $product)
                                        
                                        <tr>
                                            <td></td>
                                            <td>{{$product->ProductName}}</td>
                                            <td>{{$product->CatName}}</td>
                                            <td><img src="{{$product->URL}}" alt="" style ="height:60px; width:100px;"></td>
                                            <td>{{$product->ProductDescription}}</td>
                                            <td>{{$product->SizeDescription}}</td>
                                            <td>{{$product->ColorName}}</td>
                                            <td>{{$product->Quantity}}</td>
                                            <td>{{number_format($product->Price)}}</td>
                                            <td>
                                                <a class="p-1 m-1 btn btn-primary" href="admin/edit_prodduct/{{$product->product_id}}">Sửa</a>

                                            </td>
                                        </tr>
                                       
                                        @endforeach

                                    </tbody>

                                </table>
                                {!! $products->links() !!}
                               
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('admin_tpl/footer')

        </div>
        <!-- End of Content Wrapper -->
        

    </div>
    <!-- End of Page Wrapper -->
    @include('admin_tpl/logout_modal')

    <script>

    </script>

</body>

</html>