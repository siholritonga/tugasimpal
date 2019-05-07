<?php
  session_start();
  if(empty($_SESSION['user'])){
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Apotek</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="library/vendor/bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="library/vendor/jquery/dataTables.bootstrap.min.css"/>
  <link rel="stylesheet" href="library/dst/css/formValidation.css"/>

  <script type="text/javascript" src="library/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="library/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="library/vendor/jquery/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="library/vendor/jquery/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript" src="library/dst/js/formValidation.js"></script>
  <script type="text/javascript" src="library/dst/js/framework/bootstrap.js"></script>
  <script type="text/javascript" src="library/vendor/jquery/bootbox.min.js"></script>
  <script type="text/javascript" language="javascript" class="init">
      $(document).ready(function () {

        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
         {
             return {
                 "iStart": oSettings._iDisplayStart,
                 "iEnd": oSettings.fnDisplayEnd(),
                 "iLength": oSettings._iDisplayLength,
                 "iTotal": oSettings.fnRecordsTotal(),
                 "iFilteredTotal": oSettings.fnRecordsDisplay(),
                 "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                 "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
             };
         };

          var t = $('#tab').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": 'file.php',
              "columns": [
                  {"data": "id"},
                  {"data": "nama"},
                  {"data": "kategori"},
                  {"data": "umur"},
                  {"data": "jenis"},
                  {"data": "alamat"},
                  {"data": "nohp"},
                  {"data": "rekam"}
              ],
              "order": [[1, 'desc']],
              "rowCallback": function (row, data, iDisplayIndex) {
               var info = this.fnPagingInfo();
               var page = info.iPage;
               var length = info.iLength;
               var index = page * length + (iDisplayIndex + 1);
               $('td:eq(0)', row).html(index);
             }
          });
      });
  </script>

</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			</div>
			<div>
			  <ul class="nav navbar-nav">
			   <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span></a></li>
			   <li class="active"><a href="home.php?p=rep">Report</a></li>
			   <li class="active"><a href="home.php?p=user">User</a></li>
			 </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['user']; ?></a></li>
				<li class="active"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Log Out</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
<div class="container-fluid">
<?php
	$pages_dir = 'modal';
	if(!empty($_GET['p'])) {
		$pages = scandir($pages_dir, 0);
		unset($pages[0], $pages[1]);

		$p = $_GET['p'];
		if(in_array($p.'.php', $pages)) {
			include($pages_dir.'/'.$p.'.php');
		}
	  else {
			echo '<center><h1><b>404 Not Found</b></h1></center>';}
	 } else {
		 	 include_once($pages_dir.'/form1.php');
	 }
?>
</body>
</html>
