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
                <li class="nav-item active ">
                    <a class="nav-link " href="/admin/user"><i class="fa-sharp fa-solid fa-users"></i> Quản lý User</a>
                </li>
                <hr class="sidebar-divider">

                <li class="nav-item ">
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
                    <h1 class="h3 mb-2 text-gray-800">Thêm nhân viên</h1>

                    <br>

                    <!-- add user-->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <form action="{{route('add.user')}}" method="post">
                                @method('patch')
                                @csrf

                                Tên <br>
                                <input type="text" name="name" required class="table-bordered mb-3" autofocus><br>
                                Email <br>
                                <input type="email" name="email" required class="table-bordered mb-3"><br>
                                <div class="mb-2">
                                    <label for="level">Mức độ</label>
                                    <select name="level" class="table-bordered" id="level" onChange="select()">
                                        <option value="1">1</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>

                                <label for="role">Vai trò</label> <br>
                                <input type="text" name="role" class="table-bordered mb-3" id="role" disabled>

                                <br>
                                Mật khẩu<br>
                                <input type="password" name="password" required class="table-bordered"><br><br>

                                <input type="submit" name="submit" value="Thêm" class="btn btn-primary">

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



    <!-- Logout Modal-->
    @include('admin_tpl/logout_modal')

    <script type="text/javascript">
        function select() {
            var selected = document.getElementById('level');
            var option = selected.options[selected.selectedIndex].value;
            if (option == 1) {
                document.getElementById('role').value = "Admin";
            } else {
                document.getElementById('role').value = "Nhân Viên ";
            }
            console.log(document.getElementById('role').value);
        }
        select();
    </script>

</body>

</html>