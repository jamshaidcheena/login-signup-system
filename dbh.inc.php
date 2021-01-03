<?php
$host_name="localhost";
$user="root";
$password="";
$dbnam="login_project";
$con=mysqli_connect($host_name,$user,$password,$dbnam);
if(!$con)
{
die('could not database connected');
}
else
{
	// die('connected database!');
}

// class dbh
// {
// 	private $host_name;
// 	private $user;
// 	private $password;
// 	private $dbname;

// 	protected function connected()
// 	{
// 		$this->host_name="localhost";
// 		$this->user="user";
// 		$this->password="";
// 		$this->dbname="admin_dashbord1";

// 		$conn=new mysqli($this->host_name,$this->user,$this->password,$this->dbname);
// 		return $conn;
// 	}


		

	
// }

?>