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
                  
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Chi tiết đơn hàng </h1>
                    <div style="overflow:auto;">
                        <a href="/admin/order" class="btn mr-2" style="float: right; background-color: #3b4a6b; color: rgba(255,255,255,.8)"> Back </a>
                    </div>
                    <!-- Product list -->
                    <div class="card shadow mt-4 mb-4 p-3">

                        <!-- order list -->
                        <div class="d-flex">
                            <div class="col-sm-6">
                                <p>Order ID : {{$order->id}}</p>
                                @if($order->Status==0)
                                <p class = "text-primary">Status :  Chưa Duyệt</p>
                                @elseif($order->Status==1)
                                <p class = "text-success">Status : Đã duyệt</p>
                                @elseif($order->Status==2)
                                <p class = "text-danger">Status : Đã hủy</p>
                                @endif
                                <p>Tổng giá trị hóa đơn : {{$order->Total}}</p>
                            </div>
                            <div class=".col-sm-6">
                                <h5>Thông tin giao hàng</h5>
                                <p>Người nhận : {{$customer->name}}</p>
                                <p>Số điện thoại : {{$order->phone}} </p>
                                <p>Địa chỉ giao hàng : {{$order->address}}  </p>
                                <p>Email : {{$customer->email}}</p>
                            </div>
                        </div>
                        <div class="card shadow mb-4">


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>                                             
                                                <th>Price</th>
                                                <th>Size</th>
                                                <th>Color</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($order_detail as $detail)
                                            <tr>
                                                <td>{{$detail->ProductName}}</td>                                               
                                                <td>{{number_format($detail->Price)}}</td>
                                                <td>{{$detail->SizeName}}</td>
                                                <td>{{$detail->ColorName}}</td>
                                                <td>{{$detail->quantity}}</td>
                                                <td>{{number_format($detail->TotalPrice)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end of order list -->
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