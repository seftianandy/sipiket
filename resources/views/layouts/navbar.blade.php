<?php
$current_url = $_SERVER['REQUEST_URI'];
?>

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="../../index3.html" class="navbar-brand">
            <span class="brand-text font-weight-light">&nbsp;<i class="fa fa-bookmark"></i>&nbsp; <strong>SI</strong>PIKET</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">
                        <strong>TAPEL 2024/2025</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link <?= ($current_url == '/' || strpos($current_url, '/dashboard') !== false) ? 'active' : '' ?>">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle <?= (strpos($current_url, '/absensi') !== false) ? 'active' : '' ?>">Presensi</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="{{url('/absensi')}}" class="dropdown-item">Presensi Siswa </a></li>
                        <li><a href="" class="dropdown-item">Guru berhalangan hadir </a></li>
                        <li><a href="" class="dropdown-item">Siswa meninggalkan sekolah </a></li>
                        <li><a href="" class="dropdown-item">Pelanggaran Siswa </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle <?= (strpos($current_url, '/peserta-didik') !== false || strpos($current_url, '/kelas') !== false || strpos($current_url, '/ruang-kelas') !== false || strpos($current_url, '/mata-pelajaran') !== false || strpos($current_url, '/jadwal-pelajaran') !== false || strpos($current_url, '/jam-pelajaran') !== false || strpos($current_url, '/gtk') !== false || strpos($current_url, '/rombongan-belajar') !== false || strpos($current_url, '/tahun-ajaran') !== false) ? 'active' : '' ?>">Data</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="{{url('peserta-didik')}}" class="dropdown-item">Peserta Didik </a></li>
                        <li><a href="{{url('kelas')}}" class="dropdown-item">Kelas Jurusan</a></li>
                        <li><a href="{{url('ruang-kelas')}}" class="dropdown-item">Ruang Kelas</a></li>
                        <li><a href="{{url('mata-pelajaran')}}" class="dropdown-item">Mata Pelajaran</a></li>
                        <li><a href="{{url('jadwal-pelajaran')}}" class="dropdown-item">Jadwal Pelajaran</a></li>
                        <li><a href="{{url('gtk')}}" class="dropdown-item">Data GTK</a></li>
                        <li><a href="{{url('rombongan-belajar')}}" class="dropdown-item">Rombongan Belajar</a></li>
                        <li><a href="{{url('tahun-ajaran')}}" class="dropdown-item">Tahun Ajaran</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('/absensi')}}" class="nav-link">
                        Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" role="button">
                    <i class="far fa-calendar-alt"></i>&nbsp;
                    <span id="day"></span>, <span id="date"></span> - <strong><span id="time"></span></strong> WIB
                </a>
            </li>
        </ul>
    </div>
</nav>
