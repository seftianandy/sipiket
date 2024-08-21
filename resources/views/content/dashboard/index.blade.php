@extends('layouts.app', [
'pageTitle' => 'Dashboard'
])

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-olive">
            <div class="inner">
                <h3>150</h3>

                <p>Siswa Ijin</p>
            </div>
            <div class="icon">
                <i class="ion ion-clipboard"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-olive">
            <div class="inner">
                <h3>53</h3>

                <p>Ruang Kelas</p>
            </div>
            <div class="icon">
                <i class="ion ion-home"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-olive">
            <div class="inner">
                <h3>44</h3>

                <p>Data Siswa</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-olive">
            <div class="inner">
                <h3>65</h3>

                <p>Kelas</p>
            </div>
            <div class="icon">
                <i class="ion ion-bookmark"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
@stop

@push('js')
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminlte') }}/dist/js/pages/dashboard.js"></script>
@endpush
