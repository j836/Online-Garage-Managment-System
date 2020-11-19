<?php
	include("config.php");
	session_start();

?>
<html>
<head>
<title>Admin Panel</title>
<!--<link rel="stylesheet" type="text/css" href="dash.css">-->
<link rel="stylesheet" type="text/css" href="neon.css">
</head>
<body>
<form method="post">
  <div class="main-content">
    <div class="header">
<h1>Admin Panel</h1>
<a class="signout" href="index.php">Sign Out</a>
<a class="signout" href="dash.php">Back</a>
    </div>

<div class="sidebar">

<ul>
  <span> </span>
  <span> </span>
  <span> </span>
  <span> </span>
  <button type="submit"  class="li1"  name="all">View all customers</button>
</ul>
<ul>
  <span> </span>
  <span> </span>
  <span> </span>
  <span> </span>
  <button type="submit" class="li1"  name="ongoing">View Ongoing customers</button>
</ul>
<ul>
	 <span> </span>
  <span> </span>
  <span> </span>
  <span> </span>
	<button type="submit" class="li1" name="total">View Todays income</button>
</ul>

<img class="img" src="logo.jpg">
 </div>
		<!--div id="main-cont">
		<iframe src="" name="a1" height=815px width=800px;>
		</iframe>
		</div>
</div>
	<div class='info' target="a1" >
		
	
	
		<button class ="li" type="button" name="bill" value="bill">Generate Bill</button>
	</div-->
<div class="block1">
	Total Customers<br><br>
	<?php
		include("config.php");
		$query=("select * from customer;");
		$result=pg_query($conn,$query);
		$result1=pg_num_rows($result);
		
		{
			echo $result1;
		}
	?>
</div>
<div class="block2">
	Ongoing Customers<br><br>
	<?php
		include("config.php");
		$query=("select * from customer where status<3;");
		$result=pg_query($conn,$query);
		$result1=pg_num_rows($result);
		
		{
			echo $result1;
		}
	?>
</div>
<div class="block3">
	Completed<br><br>
	<?php
		include("config.php");
		$query=("select * from customer where status=3;");
		$result=pg_query($conn,$query);
		$result1=pg_num_rows($result);
		
		{
			echo $result1;
		}
	?>
</div>	
<div class="info">


<p>

		<center>Customers</center>
		<div class="1">
		<?php
			include("config.php");
			session_start();
			$cnt=0;	
			$query=("select * from customer ;");
			$result=pg_query($conn,$query);
  			if(isset($_POST['all']))
			{	echo "<table  class='content-table'>";
				echo"<th>Name</th><th>Mobile No.</th><th></th>";
				while($row=pg_fetch_array($result))
				{	echo"<tr>";
					$name=$row['cust_name'];
					$mob=$row['cust_mob'];
						
					
					$cnt=$cnt+1;
					echo "<th>$name</th><th>$mob</th><th>";?>
					<button type="submit" class="li2" name="bill1" value="<?php echo $cnt ?>">View Description</button>     
					<?php echo"</th></tr>";
					
						
				}
				
				echo"</table>";
			}
			
			if(isset($_POST['bill1']))
			{	
				
				$count=$_POST['bill1'];
				$i=0;
				$query1=("select customer.cust_mob from customer ;");
				$result1=pg_query($conn,$query1);
				while($i<$count && $row=pg_fetch_array($result1))
				{
						
						$mob1=$row['cust_mob'];
						$i++;
				}
				$_SESSION['mob1']=$mob1;
				header("location: bill.php");
				
			}

			$cnt1=0;

			$query1=("select * from customer where customer.status>2;");
			$result1=pg_query($conn,$query1);
			if(isset($_POST['ongoing']))
			{	$cnt1++;
				echo "<table  class='content-table' >";
				echo"<th>Name</th><th>Mobile No.</th><th></th>";
				while($row=pg_fetch_array($result1))
				{	echo"<tr>";
					$name=$row['cust_name'];
					$mob=$row['cust_mob'];
				
					echo "<th>$name</th><th>$mob</th><th>";?>
					<button type="submit" class="li2" name="bill2" value="<?php echo $cnt1 ?>">View Description</button>   
		  
					<?php echo"</th></tr>";
				}
				echo"</table>";
			}

			if(isset($_POST['bill2']))
			{	
				
				$count=$_POST['bill2'];
				$i=0;
				$query1=("select customer.cust_mob from customer where status>2;");
				$result1=pg_query($conn,$query1);
				while($i<$count && $row=pg_fetch_array($result1))
				{
						
						$mob1=$row['cust_mob'];
						$i++;
				}
				$_SESSION['mob1']=$mob1;
				header("location: bill.php");
				
			}












			$query2=("select total_bill from receipt;");
			$result2=pg_query($conn,$query2);
			if(isset($_POST['total']))
			{
				while($row=pg_fetch_array($result2))
				{
					$bill=$bill+$row['total_bill'];
				}
				echo "<center> <h1>Todays income</h1><br>$bill</center>";
			}
		


		
		if(isset($_POST['search']))
		{	$cnt2=0;
			$search=$_POST['search1'];
			$query3=("select * from customer where customer.cust_name='$search';");
			$result3=pg_query($conn,$query3);
			$c=pg_num_rows($result3);
			while($row=pg_fetch_array($result3))
				{	$cnt2++;
					echo"<table class='content-table'><tr >";
					$name=$row['cust_name'];
					$mob=$row['cust_mob'];
					
					echo"<th>Name</th><th>Mobile</th><th></th></tr>";
					echo "<tr><th>$name</th><th>$mob</th><th>";?>
					<button type="submit" class="li2" name="bill3" value="1" >View Description</button>   

		  
					<?php echo"</th></tr>";
				}
				$_SESSION['mob1']=$mob;
				echo"</table>";
			
			if($c==0)
			{
				echo "<script> alert('NO customers found');</script>";
			}
		}
			
			
			if(isset($_POST['bill3']))
			{
				header("location: bill.php");
				
			}







		

		?>
			
		
		
		</div>
</p>
</div>
<div class="search-box">
    <input type="text" class="search-txt" name="search1" placeholder="Enter Customer name"/>
    <button  type="submit" class="search-btn"  name="search" value="search">Search</button>
	
	</div>
</form>
</body>
</html>



	
	
	

