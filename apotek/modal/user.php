<div class="container-fluid"> 

<h4><b>Data User&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" data-toggle="modal" data-target="#myRekam">
<span class="glyphicon glyphicon-plus-sign"></span></a></b></h4>
  
<div class="modal fade" id="myRekam" tabindex="-1" role="dialog" aria-labelledby="myRekamLabel">
	  <div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span class="glyphicon glyphicon-remove"></span></button>
			<h4 class="modal-title" id="myModalLabel"><b>Entry Data User</b></h4>
		  </div>
		  <div class="modal-body">
	
		  <form role="form"  id="user" class="form-horizontal" name="user" action="" method="Post">
				  
			
			<div class="form-group">
		    <div class="col-sm-5">
            <input class="form-control" name="nama" type="text" placeholder="username" required/>
			</div>
            </div>
			
			<div class="form-group">
		    <div class="col-sm-5">
            <input class="form-control" name="pass" type="password" placeholder="password" required/>
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
				
				$nama = trim($_POST['nama']);
				$fnama = htmlentities($nama);
				$pas = trim($_POST['pass']);
				
				
				$insert2 = mysql_query("INSERT INTO tbuser(user, pass) values('$fnama', '$pas')");
				
				}
			?>
     		</div>
	    </div>
	 </div>
   </div>
  <hr/> 

  
 <div class="table-responsive">
  <table class="table table-hover">
	 <thead>
	   <tr>
	     <th>No.</th>
	     <th>Nama</th>
		 <th>Password</th>
		 <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
 <?php 
 $sql2 = mysql_query("SELECT * FROM tbuser");
 $no=1;
 while($data = mysql_fetch_array($sql2)) { 
?>
		<tr>
		  <td><?php print $no ;  $no++;?></td>
		  <td><?php print ($data['user']);?></td>
		  <td><?php print ($data['pass']);?></td>
		  <td><a href="dell.php?id=<?php print($data['id']); ?>" class="alert">
			<span class="glyphicon glyphicon-trash"></span></a>
		  </td>
		</tr>
        </tbody>
<?php 
} 

 ?>
	</table>
</div>
</div>
<script type="text/javascript">
   $(document).on("click", ".alert", function(e) {
            var link = $(this).attr("href"); // "get" the intended link in a var
            e.preventDefault();    
            bootbox.confirm("Are you sure delete ?", function(result) {    
                if (result) {
                    document.location.href = link;  // if result, "set" the document location       
                }    
            });
        });
</script> 