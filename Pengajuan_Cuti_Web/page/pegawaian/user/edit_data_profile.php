
<?php
require_once('./function/helper.php');
require_once('./function/koneksi.php');

$process_user = isset($_GET['process_user']) ? ($_GET['process_user']) : false;
$emptyform =  isset($_GET['emptyform']) ? ($_GET['emptyform']) : false;
$status =  isset($_GET['status']) ? ($_GET['status']) : false;


if ($_SESSION["id_user"] == null) {
    header("location: " . BASE_URL . '');
    exit();
}
// $id_user = $_SESSION['id_user'];
// $id_user =  isset($_GET['id_user']) ? ($_GET['id_user']) : false;

$id_user = $_SESSION['id_user'];
$query = "
    SELECT 
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
            // tbl_multi_user AS multi_user ON pegawai.id_user = multi_user.id_user
// $pegawai_query = mysqli_query($koneksi, "SELECT * FROM tbl_data_pegawai WHERE id_pegawai=$id_user");
$result = mysqli_query($koneksi, $query);
$pegawai = mysqli_fetch_assoc($result);
// Set nilai awal
if ($pegawai) {
    $nama_lengkap = $pegawai['nama_lengkap'];
    $nama_depan = $pegawai['nama_depan'];
    $nip = $pegawai['nip'];
    $jenis_kelamin = $pegawai['jenis_kelamin'];
    $nama_jabatan = $pegawai['nama_jabatan'];
    $nama_golongan = $pegawai['nama_golongan'];
    $unit_kerja = $pegawai['unit_kerja'];
    $pendidikan_terakhir = $pegawai['pendidikan_terakhir'];
    $alamat = $pegawai['alamat'];
    // ... other fields
} else{
    $nama_lengkap = '';
    $nama_depan = '';
    $nip = '';
    $jenis_kelamin = '';
    $nama_jabatan = '';
    $nama_golongan = '';
    $unit_kerja = '';
    $pendidikan_terakhir = '';
    $alamat = '';
}



?>

<form class="form-add" method="POST" action="<?= BASE_URL . 'process/process_user/process_pegawai/process_update_profile_pegawai.php'?>">
    <h1>PROFILE </h1>
            <?php if($emptyform == 'true') :?>
                    <div class="alert alert-danger" role="alert">
                        Proses gagal, pastikan semua formulir terisi
                    </div>
            <?php endif;?>
            <?php if($process_user == 'failed') :?>
            <div class="alert alert-danger" role="alert">
                semua formulir harus di isi
            </div>
            <?php endif;?>
            <?php if($status == 'success') :?>
                    <div class="alert_success alert-danger" role="alert">
                        berhasil di update
                    </div>
            <?php endif;?>
    <div class="box">
        <div class="box-form">
        
            <input name="id_pegawai" value="<?= $pegawai['id_pegawai'] ?>" type="hidden">
            <input name="id_jabatan" value="<?= $pegawai['id_jabatan'] ?>" type="hidden">
            <input name="id_golongan" value="<?= $pegawai['id_golongan'] ?>" type="hidden">
            <input name="id_user" value="<?= $pegawai['id_user'] ?>" type="hidden">

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" size="35" value="<?= $nama_lengkap ?>">
            </div>
            <div class="mb-3">
                <label for="nama_depan" class="form-label">Nama depan</label>
                <input type="text" class="form-control" id="nama_depan" name="nama_depan" size="35" value="<?= $nama_depan ?>">
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">nip</label>
                <input type="number" class="form-control" id="nip" name="nip"  value="<?= $nip ?>" size="35">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin">Pilih Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="jenis">
                    <option value="<?= $user['jenis_kelamin'] ?>" class="active" ><?= $jenis_kelamin ?></option>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="Perempuan">perempuan</option>
                </select>
            </div>
            
        </div>

        <div class="box-form">
            <div class="mb-3">
                <label for="pendidikan_terakhir" class="form-label">pendidikan terakhir</label>
                <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" size="35" value="<?= $pendidikan_terakhir ?>">
            </div>
            <div class="mb-3">
                <label for="unit_kerja" class="form-label">unit kerja</label>
                <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" size="35" value="<?= $unit_kerja ?>">
            </div>
            <div class="mb-3">
                <label for="nama_golongan" class="form-label">golongan</label>
                <input type="text" class="form-control" id="nama_golongan" name="nama_golongan" size="35" value="<?= $nama_golongan ?>">
            </div>
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" size="35" value="<?=  $nama_jabatan ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" size="35" value="<?= $alamat ?>">
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Submit UPDATE</button>

</form>
