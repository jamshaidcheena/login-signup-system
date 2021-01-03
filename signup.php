<?php
include 'dbh.inc.php';
if(isset($_POST['submit']))
{
	$FirstName=mysqli_real_escape_string($con,$_POST['FirstName']);
	$LastName=mysqli_real_escape_string($con,$_POST['LastName']);
	$UserName=mysqli_real_escape_string($con,$_POST['UserName']);
	$Email=mysqli_real_escape_string($con,$_POST['Email']);
	$Password=mysqli_real_escape_string($con,$_POST['Password']);
	$ConfirmPassword=mysqli_real_escape_string($con,$_POST['ConfirmPassword']);

	//password hash
	$pass=password_hash($Password, PASSWORD_BCRYPT);
	$conpass=password_hash($ConfirmPassword, PASSWORD_BCRYPT);

	$query="SELECT * FROM users WHERE Email='$Email'";
	$result=mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
	if($count > 0)
	{
		?>
			<script>
				alert("Email already exists");
			</script>
		<?php
	}
	else
	{
		if($Password === $ConfirmPassword)
		{
			$queryinsert="INSERT INTO users(FirstName,LastName,UserName,Email,Password,ConfirmPassword)
				VALUES('$FirstName','$LastName','$UserName','$Email','$pass','$conpass')";
			 $iquery=mysqli_query($con,$queryinsert);
			 if($iquery)
			 {
			 	?>
					<script>
						alert("SignUp Successfull!");
						header('location:index.php');
					</script>
				<?php	
			 }
			 else
			 {
			 	?>
					<script>
						alert("Please Correct Inter Data!");
					</script>
				<?php
			 }
		}
		else
		{
		?>
			<script>
				alert("Password Are Not Matched!");
			</script>
		<?php	
		}	
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

    <title>SignUp</title>
  </head>
  <body>
  	<?php include "nav.php";?>
  	<div style="padding-top: 8%;"></div>
    <section class="form-sc">
    	<div class="container">
    		<form method="POST" action="index.php">
    			<div class="mb-3">
			  <label class="form-label">FirstName</label>
			  <input type="text" class="form-control" name="FirstName">
			</div>
			<div class="mb-3">
			  <label class="form-label">LastName</label>
			  <input type="text" class="form-control" name="LastName">
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">UserName</label>
			  <input type="text" class="form-control" name="UserName">
			</div>
			<div class="mb-3">
			  <label class="form-label">Email</label>
			  <input type="email" class="form-control" name="Email">
			</div>
			<div class="mb-3">
			  <label class="form-label">Password</label>
			  <input type="Password" class="form-control" name="Password">
			</div>
			<div class="mb-3">
			  <label class="form-label">ConfirmPassword</label>
			  <input type="Password" class="form-control" name="ConfirmPassword">
			</div>
			<div class="mb-3">
			  <button type="submit" name="submit" class="btn btn-primary">SignUp</button>
			</div>
    		</form>
    	</div>
			
    </section>
    <?php include "footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>