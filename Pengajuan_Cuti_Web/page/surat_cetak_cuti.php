<?php

// require_once('function/helper.php');
// require_once('function/koneksi.php');

include '../function/koneksi.php';

// $process_user = isset($_GET['process_user']) ? ($_GET['process_user']) : false;


// if ($_SESSION["id"] == null) {
//     header("location: " . BASE_URL . '');
//     exit();
// }

$id_user =  isset($_GET['id_pegawai']) ? ($_GET['id_pegawai']) : false;
$query = "SELECT 
        cuti.*,
        pegawai.*,
        jabatan.*
    FROM 
        tbl_data_cuti_pegawai AS cuti
    INNER JOIN 
        tbl_data_pegawai AS pegawai ON cuti.id_pegawai = pegawai.id_pegawai
    INNER JOIN 
        tbl_data_jabatan AS jabatan ON cuti.id_jabatan = jabatan.id_jabatan
    WHERE 
        cuti.id_pegawai = $id_user";
$result = mysqli_query($koneksi, $query);
$user = mysqli_fetch_assoc($result);

$query= mysqli_query($koneksi,"SELECT * FROM tbl_data_panitera");
$panitera = mysqli_fetch_assoc($query);

$query= mysqli_query($koneksi,"SELECT * FROM tbl_data_ketua");
$ketua = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Cuti</title>

    <link rel="stylesheet" href="../style/surat_cetak_cuti_style.css">
</head>
<body>
    <!-- Kops -->
<div class="cops">
    <div class="logo">
        <img src="../img/logo.png" alt="">
    </div>
    <div class="Alamat">
        <h2>SD NEGERI KUSNAN</h2>
        Jl Kusnan Gg Melati IV No 51 Kec Kejaksan Kota Cirebon<br>
        Telp.(0231)238363,Fax,(0231)302053
    </div>
</div>

<!-- Konten -->
<div class="kontent">
    <span>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</span>
    <span class="tggl_surat">Cirebon, 
            <?php
                date_default_timezone_set('Asia/Jakarta'); // Ganti dengan zona waktu yang diinginkan
                setlocale(LC_TIME, 'id_ID'); // Set lokal ke Bahasa Indonesia
                $tanggal_sekarang = strftime("%d %B %Y");
                echo "<p>{$tanggal_sekarang}</p>";
            ?>
    </span>
    <br><br>
    <h4 style="font-weight: 100;">KEPADA<br>
    YTH KEPALA SEKOLAH SDN KUSNAN<br>
    DI-
    <br> CIREBON</h4>

    <br>
    <table>
        <tr class="judul">
            <p>I.DATA PEGAWAI</p>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><?= $user['nama_pegawai'] ?></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td><?= $user['nip'] ?></td>
        </tr>
        <tr>
            <td>JABATAN</td>
            <td><?= $user['nama_jabatan'] ?></td>
        </tr>
        <tr>
            <td>MASA KERJA</td>
            <td><?= $user['masa_kerja'] ?></td>
        </tr>
        <tr>
            <td>UNIT KERJA</td>
            <td class="td1"><?= $user['unit_kerja'] ?></td>
        </tr>
    </table>
    
    <br>
    <table>
        <tr class="judul">
            <p>II.JENIS CUTI YANG DI AMBIL</p>
        </tr>
        <tr>
            <td><?= $user['jenis_cuti'] ?></td>
            <!-- <td class="centang">&#x2713;</td>
            <td>2.Cuti Besar</td>
            <td class="centang"></td> -->
        </tr>
        <!-- <tr>
            <td>3.Cuti Sakit</td>
            <td class="centang"></td>
            <td>4.Cuti Melahirkan</td>
            <td class="centang"></td>
        </tr>
        <tr>
            <td>5.Cuti Karna Alasan Penting</td>
            <td class="centang"></td>
            <td>6.Cuti Diluar Tanggungan Negara</td>
            <td class="centang"></td>
        </tr> -->
    </table>
    
    <br>
    <table>
        <tr class="judul">
            <p>III.ALASAN CUTI</p>
        </tr>
        <tr>
            <td><?= $user['alasan_cuti'] ?></td>
        </tr>
    </table>

    <br>
    <table>
        <tr class="judul">
            <p>IV.LAMANYA CUTI</p>
        </tr>
        <tr>
            <td>Selama</td>
            <td><?= $user['lama_cuti'] ?></td>
            <td>Mulai Tanggal</td>
            <td><?= $user['tanggal_mulai'] ?></td>
            <td>s/d</td>
            <td><?= $user['tanggal_selesai'] ?></td>
        </tr>
    </table>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br>
    <table>
        <tr class="judul">
            <p>VI.ALAMAT SELAMA MENJALANKAN CUTI </p>
        </tr>
        <tr>
            <td><?= $user['kabupaten'] ?></td>
            <td>TELP</td>
            <td><?= $user['nomor_hp'] ?></td>
        </tr>
        
    </table>
    <br><br>
    <div class="ttd">
        <p>Hormat Saya</p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p><?= $user['nama_pegawai'] ?><br>
            NIP. <?= $user['nip'] ?>
        </p>
        
    </div>
    <br><br>
    <table>
        <tr class="judul">
            <p>VII.PERTIMBANGAN ATASAN LANGSUNG </p>
        </tr>
        <tr>
            <td>Disetujui</td>
            <td>Perubahan</td>
            <td>Ditangguhkan</td>
            <td>Tidak Disetujui</td>
        </tr>
        <tr>
            <td style="text-align:center;"><?= $user['app_panitera'] ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <br><br>
    </table>
    <br><br>
    <div class="ttd">
        <p>BENDAHARA
        <br>
        <br>
        <br>
        <br>
        <br>
        <p><?= $panitera['nama_panitera'] ?>.<br>
            NIP. <?= $panitera['nip_panitera'] ?>
        </p>
        
    </div>
    <br><br>
    <table>
        <tr class="judul">
            <p>VIII.KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI </p>
        </tr>
        <tr>
            <td>Disetujui</td>
            <td>Perubahan</td>
            <td>Ditangguhkan</td>
            <td>Tidak Disetujui</td>
        </tr>
        <tr>
            <td style="text-align:center;"><?= $user['app_ketua'] ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        
    </table>
    <br><br>
    <div class="ttd">
        <p>KEPALA SEKOLAH<br>
        SD NEGERI KUSNAN</p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p><?= $ketua['nama_ketua'] ?><br>
            NIP. <?= $ketua['nip_ketua'] ?>
        </p>
        
    </div>
</div>

<script>
		window.print();
</script>
</body>
</html>