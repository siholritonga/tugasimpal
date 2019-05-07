	 <h4><b>Report Data</b></h4>
		 <hr/>

		 <form class="form-inline" method="post" action="">
		  <div class="form-group">
			<div class="input-group">
			  <input type="date" class="form-control" id="tang1" name="tang1" required/>
			 </div>
		  </div>
		  <div class="form-group">
			<div class="input-group">
			  <input type="date" class="form-control" id="tang2" name="tang2" required/>
			</div>
		  </div>
		  <div class="form-group">
			<div class="input-group">
			  <button type="submit" name="rep" id="rep" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
			</div>
		  </div>
		  </form>
		  		<?php
	     require 'library.php';
    	 if(isset($_POST['rep'])) {
			 $dat1 = $_POST['tang1'];
			 $dat2 = $_POST['tang2'];
			 $dt1 = date('d-m-Y',strtotime($dat1));
			 $dt2 = date('d-m-Y',strtotime($dat2));

			 $sql = mysql_query("SELECT tbapotek.*, tbriwayat.* FROM tbapotek, tbriwayat WHERE tbapotek.id = tbriwayat.id AND tanggal BETWEEN '$dat1' AND '$dat2' ");
			 $no=1;
			 ?>
   <hr/>
		 <?php
		  if($dat1==$dat2) { ?>
		     <div class="btn alert-info"><b>Tanggal :</b> <?php echo $dt1;?></div>
		  <?php
		  } else {
		 ?>
		 <div class="btn alert-info"><b>Tanggal : </b><?php echo $dt1;?> - <?php echo $dt2;?> </div>
		  <?php } ?>
<hr/>
	<div class="table-responsive">
		  <table class="table table-hover">
			<thead>
			  <tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Kategori</th>
				<th>Umur</th>
				<th>Gender</th>
				<th>Alamat</th>
				<th>Nomor HP</th>
				<th>T</th>
			  </tr>
			</thead>
<?php
			 while($data = mysql_fetch_array($sql)){
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
			<tbody>
				<tr>
				   <td><?php print $no; $no++;?></td>
				   <td><?php print($data['nama']); ?></td>
				   <td><?php print $um; ?></td>
				   <td><?php print($data['umur']); ?></td>
				   <td><?php print $jn; ?></td>
				   <td><?php print ($data['alamat']); ?></td>
					 <td><?php print ($data['nohp']);?></td>
				   <td><?php print ($data['tarif']); ?></td>
				  </tr>
				   <?php
					}
				  ?>
			  </tbody>
			 </table>
		 <?php }
		 ?>
