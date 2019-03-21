<?php
include ("./koneksi.php");
	if($_GET[login]!=""){
		if(file_exists("$_GET[login].php"))
		include("$_GET[login].php");
		else
		echo " Error data not found ";
	}elseif($_GET[hal]!=""){
	if(file_exists("$_GET[hal].php"))
	include("$_GET[hal].php");
	else
	echo"Error data not found";
	}elseif($_GET[proses]!=""){
		if(file_exists("proses/".$_GET[proses].".php"))
		include("proses/".$_GET[proses].".php");
		else
		echo " Error data not found ";
	}else
	include("utama.php");