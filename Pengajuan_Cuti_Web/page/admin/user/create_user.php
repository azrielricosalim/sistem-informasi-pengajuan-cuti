<?php
require_once('./function/helper.php');
require_once('./function/koneksi.php');

$process_user = isset($_GET['process_user']) ? ($_GET['process_user']) : false;

$id_user =  isset($_GET['id_user']) ? ($_GET['id_user']) : false;
$user1 = mysqli_fetch_array (mysqli_query($koneksi, "SELECT * FROM tbl_multi_user WHERE id_user='$_SESSION[id_user]'"));

$pegawai_query = mysqli_query($koneksi, "SELECT * FROM tbl_data_pegawai AS pegawai
    INNER JOIN tbl_multi_user AS multi_user ON pegawai.id_user = multi_user.id_user
    INNER JOIN tbl_data_golongan AS golongan ON pegawai.id_golongan = golongan.id_golongan
    INNER JOIN tbl_data_jabatan AS jabatan ON pegawai.id_jabatan = jabatan.id_jabatan");
$pegawai = mysqli_fetch_array($pegawai_query);
?>

<form class="form-add" method="POST" action="<?= BASE_URL . 'process/process_user/process_admin/process_add.php'?>">
    <h1>TAMBAH AKUN USER </h1>
    <?php if($process_user == 'failed') :?>
            <div class="alert alert-danger" role="alert">
                semua formulir harus di isi
            </div>
    <?php endif;?>

    <div class="box">
        <div class="box-form">
            <input name="id_jabatan" value="<?= $pegawai?>" type="hidden">
            <input name="id_golongan" value="<?= $pegawai?>"  type="hidden">
            <input name="id_user" value="<?= $pegawai?>"type="hidden" >
            <div class="in_terpisah">
                <div class="mb-3">
                    <label for="nama_lengkapr" class="form-label">Nama lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" size="35">
                </div>
                <div class="mb-3">
                    <label for="nama_depan" class="form-label">Nama depan</label>
                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" size="35">
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">nip</label>
                    <input type="number" class="form-control" id="nip" name="nip" size="35">
                </div>
                <div class="mb-3">
                    <label for="nama_jabatan" class="form-label">jabatan</label>
                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" size="35">
                </div>
                <div class="mb-3">
                    <label for="nama_golongan" class="form-label">golongan</label>
                    <input type="text" class="form-control" id="nama_golongan" name="nama_golongan" size="35">
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin">Pilih Jenis Kelamin:</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="jenis">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="box-form">
                <div class="mb-3">
                    <label for="unit_kerja" class="form-label">unit kerja</label>
                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" size="35">
                </div>
                <div class="mb-3">
                    <label for="pendidikan_terakhir" class="form-label">pendidikan terakhir</label>
                    <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" size="35">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" size="35">
                </div>
                <div class="mb-3">
                    <label for="pass_user" class="form-label">password</label>
                    <input type="text" class="form-control" id="pass_user" name="pass_user" size="35">
                </div>
                <div class="mb-3">
                    <label for="level">user sebagai :</label>
                    <select id="level" name="level" class="jenis">
                        <option value="admin">admin</option>
                        <option value="pegawai">pegawai</option>
                    </select>
                </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>


</form>