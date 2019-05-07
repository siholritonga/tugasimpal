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
         	   <li class="active"><a href="home.php?p=data">Edit</a></li>
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
ob_start();
 require 'library.php';
if(isset($_GET['id'])) {
   $d = $_GET['id'];
   $id = base64_decode($d);

   $sql = mysql_query("SELECT * FROM tbapotek WHERE id = '$id' ");
   while ($data = mysql_fetch_array($sql)) { ?>

	<div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="page-header">
                    <h3>Edit Data Pasien</h3>
                </div>
                <form id="edit" method="post" class="form-horizontal" action="">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?php echo ($data['nama']);  ?>" name="nama"/>
                        </div>
                    </div>

					<div class="form-group">
                        <label class="col-sm-3 control-label">Kategori</label>
                        <div class="col-sm-6">
                         <?php if($data['kategori'] == "D") {
							echo " <div class='radio'>
			                  <label>
							<input type='radio' name='kategori' value='D' checked>Dewasa
                                </label>
                            </div>
                            <div class='radio'>
                                <label>
                                    <input type='radio' name='kategori' value='A' />Anak-anak
                                </label>
						 </div>"; }
						 else {
							 echo " <div class='radio'>
			                  <label>
							<input type='radio' name='kategori' value='D' />Dewasa
                                </label>
                            </div>
                            <div class='radio'>
                                <label>
                                    <input type='radio' name='kategori' value='A' checked/>Anak-anak
                                </label>
						 </div>";
						 }
						 ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Umur</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="umur" value="<?php echo ($data['umur']); ?>" />
                        </div>
                    </div>

					<div class="form-group">
                        <label class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-6">
                           <?php if($data['jenis'] == "L") {
							echo " <div class='radio'>
			                  <label>
							<input type='radio' name='gender' value='L' checked>Laki-laki
                                </label>
                            </div>
                            <div class='radio'>
                                <label>
                                    <input type='radio' name='gender' value='P' />Perempuan
                                </label>
						 </div>"; }
						 else {
							 echo " <div class='radio'>
			                  <label>
							<input type='radio' name='gender' value='L' />Laki-laki
                                </label>
                            </div>
                            <div class='radio'>
                                <label>
                                    <input type='radio' name='gender' value='P' checked/>Perempuan
                                </label>
						 </div>";
						 }
						 ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" name="alamat" /><?php echo ($data['alamat']);?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nomor HP</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="nohp" value="<?php echo ($data['nohp']);?>" />
                        </div>
                    </div>
   <?php
   }
   ?>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary" name="update" value="Update">Update</button>
							<a href="home.php" class="btn btn-default">Cancel<a>
                        </div>
                    </div>
                </form>
				<?php
					 require 'library.php';
					 if(isset($_POST['update'])) {

					 $kategori = $_POST['kategori'];
					 $nama = trim($_POST['nama']);
					 $umur = $_POST['umur'];
					 $alamat = trim($_POST['alamat']);
					 $jenis = $_POST['gender'];
           $nohp = trim($_POST['nohp']);

					 $update = mysql_query("UPDATE tbapotek SET kategori = '$kategori', nama = '$nama', jenis = '$jenis', umur = '$umur', alamat = '$alamat', nohp = '$nohp' WHERE  id = '$id' ");

					 if ($update) {
							echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.php">';
						}
						else {
							echo "Data belum dapat di simpan!!";
						}
					}
					?>
            </div>
        </div>
 </div>
<script type="text/javascript">
$(document).ready(function() {
 $('#edit').formValidation({
        message: 'This value is not valid',
	    excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    }
                }
            },
            umur: {
                validators: {
					notEmpty: {
                        message: 'umur is required and can\'t be empty'
                    }
                }
            },
			 gender: {
                    validators: {
                        notEmpty: {
                            message: 'Belum diPilih'
                        }
                    }
                },
			 kategori: {
                    validators: {
                        notEmpty: {
                            message: 'Belum diPilih'
                        }
                    }
                },
			 alamat: {
                message: 'alamat is not valid',
                validators: {
                    notEmpty: {
                        message: 'alamat is required and can\'t be empty'
                    }
                }
            }
        }
    });
});
</script>
<?php
   }
 else if(isset($_GET['norek'])) {
  $nr = $_GET['norek'];
  $norek = base64_decode($nr);

	$sql = mysql_query("SELECT * FROM tbriwayat WHERE norek = '$norek' ");
	while ($data = mysql_fetch_array($sql)) {
	$id = $data['id'];
  $d = base64_encode($id); ?>


	<div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="page-header">
                    <h3>Edit Data Rekam</h3>
                </div>

    <form id="edit" method="post" class="form-horizontal" action="">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" value="<?php echo ($data['tanggal']); ?>" name="tanggal"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Keluhan</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="keluhan" ><?php echo ($data['keluhan']);?></textarea>
                        </div>
                    </div>

	                <div class="form-group">
						<h5>Penunjang :</h5><hr/>
						<div class="row">
						<div class="col-md-2"><input class="form-control" name="bb" placeholder="BB" value="<?php echo ($data['bb']); ?>" type="text"/></div>
						<div class="col-md-2"><input class="form-control" name="ss" placeholder="S" value="<?php echo ($data['ss']);?>" type="text"/></div>
						<div class="col-md-2"><input class="form-control" name="td" placeholder="TD" value="<?php echo ($data['td']);?>" type="text"/></div>
						<div class="col-md-2"><input class="form-control" name="gds" placeholder="GDS" value="<?php echo ($data['gds']);?>" type="text"/></div>
						<div class="col-md-2"><input class="form-control" name="ua" placeholder="UA" value="<?php echo ($data['ua']);?>" type="text"/></div>
						<div class="col-md-2"><input class="form-control" name="chol" placeholder="CHOL" value="<?php echo ($data['chol']);?>" type="text"/></div>
						</div>
						<hr/>
                    </div>

					<div class="form-group">
                        <label class="col-sm-3 control-label">Alergi</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" value="<?php echo ($data['alergi']); ?>" name="alergi" />
                        </div>
                    </div>

					<div class="form-group">
                        <label class="col-sm-3 control-label">Obat yang diberikan</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="obat"> <?php echo ($data['obat']);?></textarea>
                        </div>
                    </div>

					<div class="form-group">
                        <label class="col-sm-3 control-label">T</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" value="<?php echo ($data['tarif']); ?>" name="tarif" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary" name="update" value="Update">Update</button>
							<a href="rekam.php?id=<?php echo $d ?>" class="btn btn-default">Cancel<a>
                        </div>
   <?php
   }
   ?>
                    </div>
                </form>
				<?php
				ob_start();

					 require 'library.php';
					 if(isset($_POST['update'])) {

					 $tanggal = $_POST['tanggal'];
					 $keluhan = trim($_POST['keluhan']);
					 $bb = trim($_POST['bb']);
					 $ss = trim($_POST['ss']);
					 $td = trim($_POST['td']);
					 $gds = trim($_POST['gds']);
					 $ua = trim($_POST['ua']);
					 $chol = trim($_POST['chol']);
					 $alergi = trim($_POST['alergi']);
					 $obat = trim($_POST['obat']);
					 $tarif = trim($_POST['tarif']);

					 $sq = mysql_query("SELECT id FROM tbriwayat WHERE norek = '$norek' ");
					 $dt = mysql_fetch_array($sq);
					 $di = $dt['id'];
           $d = base64_encode($di);


					 $update = mysql_query("UPDATE tbriwayat SET tanggal = '$tanggal', keluhan = '$keluhan', bb = '$bb', ss = '$ss', td = '$td', gds = '$gds', ua = '$ua', chol = '$chol', alergi = '$alergi', obat = '$obat', tarif = '$tarif' WHERE  norek = '$norek' ");

					 if ($update) {
							header("location:rekam.php?id=$d");
						}
						else {
							echo "Data belum dapat di simpan!!";
						}
					}
					ob_end_flush();
					?>
            </div>
        </div>
 </div>
<script type="text/javascript">
$(document).ready(function() {

    $('#edit').formValidation({
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
<?php
 }
 ?>
</body>
</html>
