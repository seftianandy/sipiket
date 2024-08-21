<form style="margin-bottom: 3em;">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="jamPelajaran">Tanggal</label>
                <input type="date" class="form-control">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="kelasFilter">Kelas</label>
                <select class="form-control select2bs42" name="kelasfilter" id="kelasFilter">
                    <option value="all">Semua Kelas</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="namaFilter">Nama Siswa</label>
                <select class="form-control select2bs43" name="namafilter" id="namaFilter">
                    <option value="all">Semua Siswa</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <button class="btn bg-navy">
                <i class="fas fa-filter"></i> Filter Data
            </button>
        </div>
    </div>
</form>
<h3>Data Absen Siswa</h3>
<table id="example1" class="table table-bordered table-sm">
    <thead class="bg-navy">
        <tr>
            <th class="text-center">DATA SISWA</th>
            <th class="text-center">KELAS</th>
            <th class="text-center">MATA PELAJARAN</th>
            <th class="text-center">AKSI</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="vertical-align: middle;">
                Nama : <br>
                NISN : <br>
                NIS : <br>
                Jenis Kelaim : <br>
                Hp/Telp :
            </td>
            <td class="text-center" style="vertical-align: middle;">KELAS</td>
            <td class="text-center" style="vertical-align: middle;">MATA PELAJARAN</td>
            <td style="vertical-align: middle;">
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-danger" type="radio" id="sakit" name="absensi">
                        <label for="sakit" class="custom-control-label">Sakit</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-danger" type="radio" id="ijin" name="absensi">
                        <label for="ijin" class="custom-control-label">Ijin</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-danger" type="radio" id="alfa" name="absensi">
                        <label for="alfa" class="custom-control-label">Alfa</label>
                    </div>
                    <br>
                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-window-close"></i>
                        Batalkan
                    </button>
                </div>
            </td>
        </tr>
    </tbody>
</table>
