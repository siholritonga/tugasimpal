<?php
include "library.php";
if(isset($_GET['norek'])) {
	$nr = $_GET['norek'];
	$norek = base64_decode($nr);

	$sql = mysql_query("SELECT id FROM tbriwayat WHERE norek = '$norek' ");
	$data = mysql_fetch_array($sql);
	$id = $data['id'];
	$d = base64_encode($id);

	$perintah2 = mysql_query("DELETE FROM tbriwayat WHERE norek = '$norek' ");
	if ($perintah2) {
		header("location:rekam.php?id=$d");
	} else
	{
      echo "Data belum dapat di simpan!!";
   }

}
else {
$d = $_GET['id'];
$id = base64_decode($d);

$perintah = mysql_query("DELETE FROM tbapotek WHERE id = '$id' ");
$perintah2 = mysql_query("DELETE FROM tbriwayat WHERE id = '$id' ");
	if ($perintah && $perintah2) {
		header("location:home.php");
	} else
	{
      echo "Data belum dapat di simpan!!";
   }
}
?>
