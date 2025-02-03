<?php
require_once('./function/helper.php');
require_once('./function/koneksi.php');

$process_user = isset($_GET['process_user']) ? ($_GET['process_user']) : false;




$id_user = $_SESSION['id_user'];
$query = "SELECT 
        pegawai.*,
        multi_user.*,
        golongan.*,
        jabatan.*
    FROM 
        tbl_data_pegawai AS pegawai
    INNER JOIN 
        tbl_multi_user AS multi_user ON pegawai.id_user = multi_user.id_user
    INNER JOIN 
        tbl_data_golongan AS golongan ON pegawai.id_golongan = golongan.id_golongan
    INNER JOIN 
        tbl_data_jabatan AS jabatan ON pegawai.id_jabatan = jabatan.id_jabatan
    WHERE 
        pegawai.id_user = $id_user";

$result = mysqli_query($koneksi, $query);
$user = mysqli_fetch_assoc($result);

$query_ketua = mysqli_query($koneksi, "SELECT * FROM tbl_data_ketua");
$ketua = mysqli_fetch_assoc($query_ketua);

$query_panitera = mysqli_query($koneksi, "SELECT * FROM tbl_data_panitera");
$panitera = mysqli_fetch_assoc($query_panitera);

?>


<form class="form-add" method="POST" action="<?= BASE_URL . 'process/process_user/process_pegawai/process_add.php'?>">
    <h1>FORMULIR PENGAJUAN CUTI PEGAWAI </h1>
    <?php if($process_user == 'failed') :?>
            <div class="alert alert-danger" role="alert">
                semua formulir harus di isi
            </div>
    <?php endif;?>

    <div class="box">
        <div class="box-form">
            <input type="hidden" name="id_pegawai" value="<?= $user?>">
            <input type="hidden" name="id_jabatan" value="<?= $user?>">
            <div class="in_terpisah">
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" size="35" value="<?= $user['nama_lengkap'] ?>" readonly>
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
                    <input type="text" class="form-control" id="masa_kerja" name="masa_kerja" size="35" >
                </div>
                <div class="mb-3">
                    <label for="lama_cuti" class="form-label">lamanya cuti</label>
                    <input type="text" class="form-control" id="lama_cuti" name="lama_cuti" size="35">
                </div>
                <div class="mb-3">
                    <label for="nama_panitera" class="form-label">nama Bendahara</label>
                    <input type="text" class="form-control" id="nama_panitera" name="nama_panitera" size="35" value="<?= $panitera['nama_panitera'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_ketua" class="form-label">nama Kepala Sekolah</label>
                    <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" size="35" value="<?= $ketua['nama_ketua'] ?>" readonly>
                </div>
            </div>
        </div>

        <div class="box-form">
                <div class="mb-3">
                    <label for="unit_kerja" class="form-label">unit kerja</label>
                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" size="35" value="<?= $user['unit_kerja'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="kabupaten" class="form-label">Kota/Kabupaten</label>
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" size="35">
                </div>
                <div class="mb-3">
                    <label for="nomor_hp" class="form-label">nomor hp</label>
                    <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" size="35">
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai_cuti" class="form-label">tanggal mulai cuti</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" size="35">
                </div>
                <div class="mb-3">
                    <label for="tanggal_selesai_cuti" class="form-label">tanggal selesai cuti</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" size="35">
                </div>
                <div class="mb-3">
                    <label for="jenis_cuti">jenis cuti:</label>
                    <select id="jenis_cuti" name="jenis_cuti" class="jenis">
                        <option value="">.....</option>
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
                    <textarea id="alasan_cuti" name="alasan_cuti" rows="2" cols="45" ></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="app_panitera">persetujuan  Bendahara</label>
                    <select id="app_panitera" name="app_panitera" class="jenis">
                        <option value="menunggu persetujuan">menunggu persetujuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="app_ketua">persetujuan Kepala Sekolah</label>
                    <select id="app_ketua" name="app_ketua" class="jenis">
                        <option value="menunggu persetujuan">menunggu persetujuan</option>
                    </select>
                </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>


</form>