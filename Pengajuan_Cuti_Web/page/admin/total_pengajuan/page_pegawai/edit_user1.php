
<?php
require_once('./function/helper.php');
require_once('./function/koneksi.php');

$process_user = isset($_GET['process_user']) ? ($_GET['process_user']) : false;
$emptyform =  isset($_GET['emptyform']) ? ($_GET['emptyform']) : false;


if ($_SESSION["id_user"] == null) {
    header("location: " . BASE_URL . '');
    exit();
}

$id_user =  isset($_GET['id_pegawai']) ? ($_GET['id_pegawai']) : false;
$user = mysqli_fetch_array (mysqli_query($koneksi, "SELECT * FROM tbl_data_cuti_pegawai AS cuti
    INNER JOIN 
        tbl_data_jabatan AS jabatan ON cuti.id_jabatan = jabatan.id_jabatan
    INNER JOIN
        tbl_data_pegawai AS pegawai ON cuti.id_pegawai = pegawai.id_pegawai
    WHERE cuti.id_pegawai=$id_user"));

?>

<form class="form-add" method="POST" action="<?= BASE_URL . 'process/process_user/process_admin/process_pegawai/process_edit.php'?>">
<h1>PENGAJUAN CUTI PEGAWAI </h1>
    <?php if($process_user == 'failed') :?>
            <div class="alert alert-danger" role="alert">
                semua formulir harus di isi
            </div>
    <?php endif;?>
    <?php if($emptyform == 'true') :?>
            <div class="alert alert-danger" role="alert">
                semua formulir harus di isi
            </div>
    <?php endif;?>

    <div class="box">
        <div class="box-form">
            <input type="hidden" name="id_cuti_pegawai" value="<?= $user['id_cuti_pegawai'] ?>">
            <input type="hidden" name="id_pegawai" value="<?= $user['id_pegawai'] ?>">
            <input type="hidden" name="id_jabatan" value="<?= $user['id_jabatan'] ?>">
            <div class="in_terpisah">
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" size="35" value="<?= $user['nama_pegawai'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">nip</label>
                    <input type="number" class="form-control" id="nip" name="nip" size="35" value="<?= $user['nip'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin">Pilih Jenis Kelamin:</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="jenis">
                        <option value="<?= $user['jenis_kelamin'] ?>" class="active"><?= $user['jenis_kelamin'] ?></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pendidikan_terakhir" class="form-label">pendidikan terakhir</label>
                    <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" size="35" value="<?= $user['pendidikan_terakhir'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_jabatant" class="form-label">jabatan</label>
                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" size="35" value="<?= $user['nama_jabatan'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" size="35" value="<?= $user['alamat'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="masa_kerja" class="form-label">masa kerja</label>
                    <input type="text" class="form-control" id="masa_kerja" name="masa_kerja" size="35" value="<?= $user['masa_kerja'] ?>" >
                </div>
                <div class="mb-3">
                    <label for="lama_cuti" class="form-label">lamanya cuti</label>
                    <input type="text" class="form-control" id="lama_cuti" name="lama_cuti" size="35" value="<?= $user['lama_cuti'] ?>">
                </div>
                <div class="mb-3">
                    <label for="nama_panitera" class="form-label">nama panitera</label>
                    <input type="text" class="form-control" id="nama_panitera" name="nama_panitera" size="35" value="<?= $user['nama_panitera'] ?>">
                </div>
                <div class="mb-3">
                    <label for="nama_ketua" class="form-label">nama ketua</label>
                    <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" size="35" value="<?= $user['nama_ketua'] ?>">
                </div>
            </div>
        </div>

        <div class="box-form">
                <div class="mb-3">
                    <label for="unit_kerja" class="form-label">unit kerja</label>
                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" size="35" value="<?= $user['unit_kerja'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="kabupaten" class="form-label">kabupaten</label>
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" size="35" value="<?= $user['kabupaten'] ?>">
                </div>
                <div class="mb-3">
                    <label for="nomor_hp" class="form-label">nomor hp</label>
                    <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" size="35" value="<?= $user['nomor_hp'] ?>">
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai_cuti" class="form-label">tanggal mulai cuti</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" size="35" value="<?= $user['tanggal_mulai'] ?>">
                </div>
                <div class="mb-3">
                    <label for="tanggal_selesai_cuti" class="form-label">tanggal selesai cuti</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" size="35" value="<?= $user['tanggal_selesai'] ?>">
                </div>
                <div class="mb-3">
                    <label for="jenis_cuti">jenis cuti:</label>
                    <select id="jenis_cuti" name="jenis_cuti" class="jenis">
                        <option value="<?= $user['jenis_cuti'] ?>" style="background-color: rgb(0, 191, 255);"><?= $user['jenis_cuti'] ?></option>
                        <option value="cuti tahunan">cuti tahunan</option>
                        <option value="cuti sakit">cuti sakit</option>
                        <option value="cuti melahirkan">cuti melahirkan</option>
                        <option value="cuti karena alasan penting">cuti karena alasan penting</option>
                        <option value="cuti besar">cuti besar</option>
                        <option value="cuti melahirkan">cuti melahirkan</option>
                        <option value="cuti diluar tanggung Negara">cuti diluar tanggung Negara</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="alasan_cuti" class="form-label">alasan cuti</label>
                    <textarea id="alasan_cuti" name="alasan_cuti" rows="2" cols="45" ><?= $user['alasan_cuti'] ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="app_panitera">persetujuan  panitera</label>
                    <select id="app_panitera" name="app_panitera" class="jenis">
                        <option value="<?= $user['app_panitera'] ?>"><?= $user['app_panitera'] ?></option>
                        <option value="tidak disetujui">tidak disetujui</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="app_ketua">persetujuan ketua</label>
                    <select id="app_ketua" name="app_ketua" class="jenis">
                        <option value="<?= $user['app_ketua'] ?>"><?= $user['app_ketua'] ?></option>
                        <option value="tidak disetujui">tidak disetujui</option>
                    </select>
                </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
