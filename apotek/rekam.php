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
  <link rel="stylesheet" href="library/dst/css/formValidation.css"/>

  <script type="text/javascript" src="library/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="library/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="library/dst/js/formValidation.js"></script>
  <script type="text/javascript" src="library/dst/js/framework/bootstrap.js"></script>
   <script type="text/javascript" src="library/vendor/jquery/bootbox.min.js"></script>
</head>
<body>
		<nav class="navbar navbar-inverse navbar-static-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			</div>
			<div>
			  <ul class="nav navbar-nav">
			   <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span></a></li>
			   <li class="active"><a href="home.php?p=data">Edit</a></li>
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
 require 'library.php';
 if(isset($_GET['id'])) {
 $d = $_GET['id'];
 $id = base64_decode($d);
 $sql = mysql_query("SELECT * FROM tbapotek WHERE id = '$id' ");
 $data = mysql_fetch_array($sql);
 $id = $data['id'];
 $wumur = $data['kategori'];
 $dw = "D";
 $wjen = $data['jenis'];
 $jl = "L";
if($wumur == $dw) {
  $um = "Dewasa";
 }
else {
	$um = "Anak";
	}
if($wjen == $jl) {
  $jn = "Laki-Laki";
 }
else {
	$jn = "Perempuan";
 }
 ?>

  <h4><b>Rekam Medis&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" data-toggle="modal" data-target="#myRekam">
  <span class="glyphicon glyphicon-plus-sign"></span></a></b></h4>

<div class="modal fade" id="myRekam" tabindex="-1" role="dialog" aria-labelledby="myRekamLabel">
	  <div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span class="glyphicon glyphicon-remove"></span></button>
			<h4 class="modal-title" id="myModalLabel"><b>Entry Data Rekam</b></h4>
		  </div>
		  <div class="modal-body">

		  <form role="form"  id="rekam" class="form-horizontal" name="rekam" action="" method="Post">

			<div class="form-group">
		    <div class="col-sm-3">
            <input class="form-control" name="id" type="hidden" value="<?php echo $id;?>" readonly />
			</div>
            </div>

			<div class="form-group">
		    <div class="col-sm-5">
            <input class="form-control" name="tanggal" type="date" required/>
			</div>
            </div>

		    <div class="form-group">
			<div class="col-sm-5">
			<div class="input-group">
            <textarea class="form-control" name="keluhan" placeholder="keluhan"></textarea>
			</div>
			</div>
            </div>

			<legend><h5>Penunjang :</h5></legend>
			<div class="row">
			<div class="col-md-2"><input class="form-control" name="bb" placeholder="BB" type="text"/></div>
			<div class="col-md-2"><input class="form-control" name="ss" placeholder="S" type="text"/></div>
			<div class="col-md-2"><input class="form-control" name="td" placeholder="TD" type="text"/></div>
			</div>
			<hr/>

            <div class="alert alert-danger">
			<?php
			$query = mysql_query("SELECT * FROM tbriwayat WHERE id = '$id' ");
			$d = mysql_fetch_array($query);
			echo "Alergi Obat : ".$d['alergi'];
			?>
			</div>

			<div class="form-group">
			<div class="col-sm-5">
			<div class="input-group">
            <textarea class="form-control" name="obat" placeholder="obat yang diberikan"></textarea>
			</div>
			</div>
            </div>

			<div class="form-group">
			<div class="col-sm-3">
			<div class="input-group">
			<input type="text" class="form-control" name="tarif" placeholder="T" />
			</div>
			</div>
			</div>

			<div class="form-group">
			<div class="col-sm-5">
			<button type="submit" name="saves" id="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span></button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
			</div>
			</form>
			 <?php
			require 'library.php';
			if(isset($_POST['saves'])) {

				$keluhan = trim($_POST['keluhan']);
				$bb = trim($_POST['bb']);
				$ss = trim($_POST['ss']);
				$td = trim($_POST['td']);
				
				$obat = trim($_POST['obat']);
				$date = $_POST['tanggal'];
				$id = $_POST['id'];
        $tarif = trim($_POST['tarif']);

				$insert2 = mysql_query("INSERT INTO tbriwayat(id, tanggal, keluhan, bb, ss, obat, tarif) values('$id', '$date', '$keluhan', '$bb', '$ss', '$td','$obat','$tarif')");

				}
			?>
     		</div>
	    </div>
	 </div>
   </div>
  <hr/>
<div class="row">
  <div class="col-xs-1"><b>Nama</b></div>
   <div class="col-xs-3">: <?php echo $data['nama'];?></div>
   <div class="col-xs-1"><b>Umur</b></div>
   <div class="col-xs-3">: <?php echo $data['umur'];?></div>
</div>
<div class="row">
  <div class="col-xs-1"><b>Gender</b></div>
   <div class="col-xs-3">: <?php echo $jn;?></div>
   <div class="col-xs-1"><b>Kategori</b></div>
   <div class="col-xs-3">: <?php echo $um;?></div>
</div>
<div class="row">
  <div class="col-xs-1"><b>Alamat</b></div>
   <div class="col-xs-3">: <?php echo $data['alamat'];?></div>
</div>
<hr/>
 <div class="table-responsive">
  <table class="table table-hover">
	 <thead>
	   <tr>
	     <th>No.</th>
	     <th>Tanggal</th>
		 <th>Keluhan</th>
		 <th>BB</th>
		 <th>S</th>
		 <th>TD</td>
		 <th>Alergi</th>
		 <th>Obat yang diberikan</th>
		 <th>T</th>
     <th>action</th>
	    </tr>
	  </thead>
	  <tbody>
 <?php
 $sql2 = mysql_query("SELECT * FROM tbriwayat WHERE id = '$id' ORDER BY tanggal ASC");
 $no=1;
 while($data = mysql_fetch_array($sql2)) {
 $da = $data['tanggal'];
 $date = date('d-m-Y',strtotime($da));
 $vdata = $data['obat'];?>
		<tr>
		  <td><?php print $no ;  $no++;?></td>
		  <td><?php print $date; ?></td>
		  <td><?php print ($data['keluhan']);?></td>
		  <td><?php print($data['bb']);?></td>
		  <td><?php print($data['ss']);?></td>
		  <td><?php print($data['td']);?></td>
		  <td><?php print ($data['alergi']);?></td>
		  <td><?php print nl2br("$vdata");?></td>
		  <td><?php print ($data['tarif']);?></td>

            <?php
            $norek = $data['norek'];
            $nr = base64_encode($norek);
            ?>

      		  <td><a href="del.php?norek=<?php echo $nr; ?>" class="alert">
      			  <span class="glyphicon glyphicon-trash"></span></a>
      			  <a href="edit.php?norek=<?php print $nr; ?>">
      			  <span class="glyphicon glyphicon-pencil"></span></a>
      		  </td>
		</tr>
        </tbody>
<?php
}
 }
 ?>
	</table>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $(document).on("click", ".alert", function(e) {
           var link = $(this).attr("href"); // "get" the intended link in a var
           e.preventDefault();
           bootbox.confirm("Are you sure delete ?", function(result) {
               if (result) {
                   document.location.href = link;  // if result, "set" the document location
               }
           });
       });

	$('#myRekam').on('hidden.bs.modal', function() {
	$('#rekam').formValidation('resetForm', true);
	});
    $('#rekam').formValidation({
        message: 'This value is not valid',
	    excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            keluhan: {
                message: 'keluhan is not valid',
                validators: {
                    notEmpty: {
                        message: 'keluhan is required and can\'t be empty'
                    }
                }
            },
			penunjang: {
                message: 'penunjang is not valid',
                validators: {
                    notEmpty: {
                        message: 'penunjang is required and can\'t be empty'
                    }
                }
            },
			alergi: {
                message: 'alergi is not valid',
                validators: {
                    notEmpty: {
                        message: 'alergi is required and can\'t be empty'
                    }
                }
            },
			obat: {
                message: 'obat is not valid',
                validators: {
                    notEmpty: {
                        message: 'obat is required and can\'t be empty'
                    }
                }
            }
        }
    });
});
</script>
</body>
</html>
