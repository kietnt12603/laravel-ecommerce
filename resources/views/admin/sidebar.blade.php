<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @php
                if (Auth::check()) {
                    $username = Auth::user()->name;
                    $avatar = Auth::user()->avatar;
                }
            @endphp
            <div class="image">
                <img src="/images/{{ $avatar }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ $username }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{route('admin')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Bảng Điều Kiển
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('category')}}" class="nav-link ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Danh Mục
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('product') }}" class="nav-link ">
                        <i class="nav-icon fas fa-mobile"></i>
                        <p>
                            Sản Phẩm
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('attributes') }}" class="nav-link ">
                        <i class="nav-icon fas fa-mobile"></i>
                        <p>
                            Thuộc Tính
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <!-- <i class="fa-solid "></i> -->
                        <p>
                            Tài Khoản
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customers') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Khách Hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhân Viên</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item ">
                    <a href="/admin/categoryblog" class="nav-link ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Danh Mục Bài Viết
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="/admin/blog" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Bài Viết
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item ">
                    <a href="/admin/cart" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Hoá Đơn
                        </p>
                    </a>
                </li>

                <!--            <li class="nav-item ">-->
                <!--                <a href="index.php?act=dsbl" class="nav-link ">-->
                <!--                    <i class="nav-icon fas fa-comment"></i>-->
                <!--                    <p>-->
                <!--                        Bình Luận-->
                <!--                    </p>-->
                <!--                </a>-->
                <!--            </li>-->

                <!--            <li class="nav-item">-->
                <!--                <a href="#" class="nav-link">-->
                <!--                    <i class="nav-icon fas fa-list"></i>-->
                <!--                    <p>-->
                <!--                        Đơn Hàng-->
                <!--                        <i class="fas fa-angle-left right"></i>-->
                <!--                        <!-- <span class="badge badge-info right">6</span> -->-->
                <!--                    </p>-->
                <!--                </a>-->
                <!--                <ul class="nav nav-treeview">-->
                <!--                    <li class="nav-item">-->
                <!--                        <a href="index.php?act=dshd" class="nav-link">-->
                <!--                            <i class="far fa-circle nav-icon"></i>-->
                <!--                            <p>Danh Sách Hoá Đơn</p>-->
                <!--                        </a>-->
                <!--                    </li>-->
                <!--                    <li class="nav-item">-->
                <!--                        <a href="index.php?act=addhd" class="nav-link">-->
                <!--                            <i class="far fa-circle nav-icon"></i>-->
                <!--                            <p>Thêm Hoá Đơn</p>-->
                <!--                        </a>-->
                <!--                    </li>-->
                <!--                </ul>-->
                <!--            </li>-->
                <!--            <li class="nav-item ">-->
                <!--                <a href="index.php?act=thongtinchung" class="nav-link ">-->
                <!--                    <i class="nav-icon fas fa-address-book"></i>-->
                <!--                    <p>-->
                <!--                        Thông Tin Liên Hệ-->
                <!--                    </p>-->
                <!--                </a>-->
                <!--            </li>-->
                <!--            <li class="nav-item ">-->
                <!--                <a href="index.php?act=phanhoi" class="nav-link ">-->
                <!--                    <i class="nav-icon fas fa-comment"></i>-->
                <!--                    <p>-->
                <!--                        Khách Hàng Phản Hồi-->
                <!--                    </p>-->
                <!--                </a>-->
                <!--            </li>-->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
