<?php
session_start();
include 'library.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Apotek</title>
	
	<link href="library/vendor/bootstrap/css/font.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="library/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="library/vendor/bootstrap/css/styles.css" />
 
</head>
<body>
 <section class="container">
   <h2><b>Apotek Sihol Ritonga<b></h2>
   <i>Kota Purwakarta</i>
  <hr/>
   <section class="login-form">
	 <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="login" role="login">
	   <section>

	 	<h3>Please Sign in</h3>
<?php
if (isset($_POST['go'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	$sql = mysql_query("SELECT * FROM tbuser WHERE user = '$user' AND pass = '$pass' ");
	$ceknum = mysql_num_rows($sql);
	if($ceknum==TRUE) {
		$_SESSION['user']=$user;
		header("location:home.php");
	}
	else {
		echo "<div class='alert alert-danger' role='alert'>
			  <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
			  &nbsp;
			  <span class='sr-only'>Error:</span>
			  user or name not valid
			 </div>";
	}
}
?>	
			<div class="form-group">
	    		<div class="input-group">
				<div class="input-group-addon"><span class="text-primary glyphicon glyphicon-user"></span></div>
		 		<input type="text" name="user" id="user" placeholder="nama" class="form-control" required />
				</div>
				</div>
				
				<div class="form-group">
		    	<div class="input-group">
			    <div class="input-group-addon"><span class="text-primary glyphicon glyphicon-lock"></span></div>
				<input type="password" name="pass" id="pass" placeholder="Password" class="form-control" required />
				</div>
				</div>
				<button type="submit" name="go" class="btn btn-block btn-success">Sign in</button>
				<div>Copyright by Ritonga Family</div>
		 </section>		
		</form>
	</section>
</section>
</body>
</html>