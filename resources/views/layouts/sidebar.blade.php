<aside class="main-sidebar sidebar-light-warning elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">&nbsp;<i class="fa fa-bookmark"></i>&nbsp; <strong>SI</strong> -
            PIKET</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte') }}/dist/img/user2-160x160.jpg"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tv"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('absensi')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>
                            Absensi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="peserta-didik" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('peserta-didik')}}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Peserta Didik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('kelas')}}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('ruang-kelas')}}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Ruang Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('mata-pelajaran')}}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Mata Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('jadwal-pelajaran')}}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Jadwal Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('jam-pelajaran')}}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Jam Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('guru')}}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('wali-kelas')}}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Wali Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('tahun-ajaran')}}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Tahun Ajaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">USER MENU</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link bg-navy">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout User
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
