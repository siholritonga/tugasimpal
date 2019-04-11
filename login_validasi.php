<?php
include "koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$txtUser = antiinjection($_POST['txtUser']);
$txtPassword    = antiinjection(md5($_POST['txtPassword']));
$cmbLevel =$_POST['cmbLevel'];

$login=mysql_query("SELECT * FROM petugas WHERE username='".$txtUser."' AND password='".md5($txtPassword)."' AND level='$cmbLevel'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu = 0){
  session_start();
  session_register("namauser");
  session_register("namalengkap");
  session_register("passuser");
  session_register("leveluser");

  $_SESSION[namauser]     = $r[username];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[level];
  
  echo "<meta http-equiv='refresh' content='0; url=?page=Halaman-Utama'>";
}
else{
  echo "<link href=../config/adminstyle.css rel=stylesheet type=text/css>";
  echo "<center>LOGIN GAGAL...!!! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
?>