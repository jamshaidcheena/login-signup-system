<?php
session_start();
include 'dbh.inc.php';
if(isset($_POST['submit']))
{
	 $UserName=mysqli_real_escape_string($con,$_POST['UserName']);
	$Password=mysqli_real_escape_string($con,$_POST['Password']);
	

	$query="SELECT * FROM users WHERE UserName='$UserName'";
	$result=mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
	if($count > 0)
	{
		$fetch_email=mysqli_fetch_assoc($result);
		$fetch_password=$fetch_email['Password'];
		//username fatching
		$_SESSION['UserName']=$UserName;
		$Password_verify=password_verify($Password,$fetch_password);
		if($Password_verify)
		{
			?>
			<script>
				alert("login to successful");
				location.replace("index.php")
			</script>
		
		<?php
		}
		else
		{
			?>
			<script>
				alert("password incorrect!");
			</script>
		<?php
		}
	}
	else
	{
		?>
			<script>
				alert("invalid email");
			</script>
		<?php
	}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Login Account</title>
  </head>
  <body>
  	<?php include "nav.php";?>
  	<div style="padding-top: 7%;"></div>
    <section class="section mt-5">
    	<div class="container">
    		<form method="POST" action="">
    			
			
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">UserName</label>
			  <input type="text" class="form-control" name="UserName">
			</div>
			<div class="mb-3">
			  <label class="form-label">Password</label>
			  <input type="Password" class="form-control" name="Password">
			</div>
			<div class="mb-3">
			  <button type="submit" name="submit" class="btn btn-primary">Login</button>
			</div>
    		</form>
    	</div>
			
    </section>
    <?php include "footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>