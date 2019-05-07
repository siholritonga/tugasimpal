<?php
require 'library.php';
if(isset($_POST)) {


$kategori = $_POST['kategori'];
$jenis = $_POST['gender'];
$nama = $_POST['nama'];
$um = $_POST['umur'];
$tm = $_POST['time'];
$umur = $um.$tm;
$alamat = trim($_POST['alamat']);
$nohp = trim($_POST['nohp']);
$keluhan = trim($_POST['keluhan']);
$bb = trim($_POST['bb']);
$ss = trim($_POST['ss']);
$td = trim($_POST['td']);
$gds = trim($_POST['gds']);
$ua = trim($_POST['ua']);
$chol = trim($_POST['chol']);
$date = $_POST['tanggal'];
$alergi = trim($_POST['alergi']);
$obat = trim($_POST['obat']);
$tarif = trim($_POST['tarif']);
$failure = "Failure !!!, id Sudah Ada";

$sql = mysql_query("SELECT MAX(id) AS Mid FROM tbapotek");
$f = mysql_fetch_array($sql);
$Maxid = $f['Mid'];

function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
$kode = substr($id_terakhir, 0, $panjang_kode);
$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
$id_baru = $kode.$angka_baru;
return $id_baru;
}



$fMaxid = autonumber($Maxid, 1, 4);
//f999 max id

$ceknum = mysql_query("SELECT id FROM tbapotek WHERE id = '$fMaxid' ");
$ceknum2 = mysql_num_rows($ceknum);

if($ceknum2) {?>
  <div class="alert alert-warning">
     Failure !!!, id Sudah Ada
      </div>
<?php
}
else {
    $insert = mysql_query("INSERT INTO tbapotek (id, kategori, nama, jenis, umur, alamat, nohp) values('$fMaxid', '$kategori', '$nama', '$jenis', '$umur', '$alamat', '$nohp')");
    $insert2 = mysql_query("INSERT INTO tbriwayat(id, tanggal, keluhan, bb, ss, td, gds, ua, chol, alergi, obat, tarif) values('$fMaxid', '$date', '$keluhan', '$bb', '$ss', '$td', '$gds', '$ua', '$chol', '$alergi', '$obat', '$tarif')");
}

}
?>
