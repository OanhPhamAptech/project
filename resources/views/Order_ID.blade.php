<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Order</title>

    <!-- Custom fonts for this template -->
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
                <li class="nav-item ">
                    <a class="nav-link " href="/admin/user"><i class="fa-sharp fa-solid fa-users"></i> Quản lý User</a>
                </li>
                <hr class="sidebar-divider">

                <li class="nav-item ">
                    <a class="nav-link " href="/admin"> <i class="fa-solid fa-bars"></i>Quản lý sản phẩm</a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item active">
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

                <!-- Topbar -->
                @include('admin_tpl/topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Dashboard -->
               

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Danh sách đơn hàng</h1>
                    <!-- Product list -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="input-group">
                                <form action="{{route('search_Order')}}" method="get">
                                    <input type="text" name="search" required class="form-control bg-light border-0 small" placeholder="Tìm kiếm mã đơn hàng" aria-label="Search" aria-describedby="basic-addon2">
                                   
                                </form>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Tỏng</th>
                                            <th>Ngày đặt hàng</th>
                                            <th width="25%">Trạng thái</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($collections as $collection)

                                        <tr>
                                            <td class=" justify-content-center"> <a href="/admin/order_{{$collection->id}}" class="p-1 m-1">{{$collection->id}} </a> </td>
                                            <td>{{$collection->Total}}</td>
                                            <td>{{$collection->created_at}}</td>
                                            @if($collection->Status==0)
                                            <td>
                                                <form style="display:inline-block;" action="/admin/aprrove_order_{{$collection->id}}" method="post" onsubmit="return confirm('Bạn muốn duyệt đơn hàng này?')">
                                                    @csrf
                                                    <button type="submit" class="p-1 m-1 btn btn-success">Duyệt đơn</button>
                                                </form>
                                                <form style="display:inline-block;" action="/admin/cancel_order_{{$collection->id}}" method="post" onsubmit="return confirm('Bạn muốn hủy đơn hàng này?')">
                                                    @csrf
                                                    <button type="submit" class="p-1 m-1 btn btn-danger ">Hủy đơn </button>
                                                </form>
                                            </td>
                                            @elseif($collection->Status==1)
                                            <td class="text-success">Đã duyệt bởi {{$collection->name}} </td>
                                            @else($collection->Status==2)
                                            <td class="text-danger">Đã hủy bởi {{$collection->name}}</td>
                                            @endif
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

            <!-- Footer -->
            @include('admin_tpl/footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('admin_tpl/logout_modal')


</body>

</html>