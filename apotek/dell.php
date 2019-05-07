<?php
include 'library.php';
$id = $_GET['id'];

$perintah = mysql_query("DELETE FROM tbuser WHERE id = '$id' ");
	if ($perintah) {
		header("location:home.php?p=user");
	} else
	{
      echo "Data belum dapat di simpan!!";
   }
?>
