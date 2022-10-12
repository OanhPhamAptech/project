<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Product</title>

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
                <li class="nav-item  ">
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

                <!-- Topbar -->
                @include('admin_tpl/topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa sản phẩm </h1>

                    <br>

                    <!-- edit form -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <form action="/admin/edit_size/colorid={{$colors->id}}" method="post" enctype="multipart/form-data">
                               @method('patch')
                                @csrf
                                Tên sản phẩm <br>
                                <input type="text" name="ProductName" required class="table-bordered" disabled value="{{$products->ProductName}}"><br> <br>
                                Brand <br>
                                <input type="text" name="CatName" disabled class="table-bordered" value="{{$cat->CatName}}"> <br>
                                Product Description <br>
                                <textarea disabled type="text" name="ProductDescription" required class="table-bordered" rows="5" cols="60">{{$sizes->product->ProductDescription}}</textarea><br>
                                Product Picture <br> <br>
                                <input type="file" name="image" class="table-bordered"><br> <br>
                                @error('image')
                                <span class="text-danger">Vui lòng chỉ chọn file ảnh có dung lượng nhỏ hơn 1 MB</span> <br> <br>
                                @enderror
                                Size <br>
                                <input type="text" name="SizeName" required class="table-bordered" Value="{{$sizes->SizeName}}"><br>
                                Size Description<br>
                                <input type="text" name="SizeDescription" required class="table-bordered" value="{{$sizes->SizeDescription}}"><br>
                                Price <br>
                                <input type="text" name="Price" required class="table-bordered" value="{{$sizes->Price}}"><br>
                                Color <br>
                                <input type="text" name="ColorName" required class="table-bordered" value="{{$colors->ColorName}}"><br>
                                Quantity <br>
                                <input type="number" name="Quantity" required class="table-bordered" value="{{$colors->Quantity}}"><br>

                                <input type="submit" name="submit" value="Save" class="btn btn-primary mt-2">
                            </form>

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