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
                    <a class="nav-link " href="/admin"> <i class="fa-solid fa-bars"></i>Quản lý sản phẩm</a>
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

                    <br>

                    <!-- Product list -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                                @endif

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product Name</th>
                                            <th>Product Picture</th>
                                            <th>Size Name</th>
                                            <th>Size Description</th>
                                            <th>Color</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>


                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($colors as $color)

                                        <tr>
                                            <td></td>
                                            <td>{{$color->size->product->ProductName}}</td>
                                            <td><img src="/{{$color->img->URL}}" alt="" style="height:60px; width:100px;"></td>
                                            <td>{{$color->size->SizeName}}</td>
                                            <td>{{$color->size->SizeDescription}}</td>
                                            <td>{{$color->ColorName}}</td>
                                            <td>{{$color->Quantity}}</td>
                                            <td>{{number_format($color->size->Price)}}</td>



                                            <td>
                                                <a class="p-1 m-1 btn btn-primary btn-block btn-sm" href="/admin/edit_size/colorid={{$color->id}}">Sửa</a>
                                                <form action="/admin/delete_color/colorid={{$color->img->id}}" method="post" onsubmit="return confirm('Bạn muốn xóa dòng dữ liệu này?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type ="submit" class="p-1 m-1 btn btn-danger btn-block btn-sm">Xóa</button>
                                                </form>
                                                <a class="p-1 m-1 btn btn-secondary btn-block btn-sm" href="/admin/add_color/sizeid={{$color->size->id}}">Thêm màu</a>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>

                                </table>

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