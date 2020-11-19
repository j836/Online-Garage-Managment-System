
<?php
	//session_start();
	$conn=pg_connect("host=192.168.16.1 port=5432 ") or die("An error occurred in connecting database");
	
	$user=$_POST['uname'];
	$password=$_POST['psw'];
	$result=pg_query($conn,"select * from customer where cust_login="+$user+"and cust_pass="+$psw);
	$row=pg_fetch_array($result);	

	$count=pg_num_rows($result);
	if($count==0)
	{
		echo" Invalid username or password";
	}
	if($count==1)
	{
		/*session_register("user");*/
		/*$_SESSION['login_user']=$user;*/
		echo "Login successful";
		header("location: cust.php");
	}
?>
	
