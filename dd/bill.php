


<html>
<head>


<link rel="stylesheet" type="text/css" href="bill.css">
</head>
<body>
<form method="post">

    <div class="header">
<h1>Admin Panel</h1>
<a class="signout" href="index.php">Sign Out</a>
<a class="signout" href="dash.php">Back</a>
    </div>
 <div class="info">
		<?php
			include("config.php");
			session_start();
			$mob=$_SESSION['mob1'];
			
			$query1=("select * from customer where cust_mob='$mob';");
			$result1=pg_query($conn,$query1);
			$query2=("select * from vehicle where cust_mob='$mob';");
			$result2=pg_query($conn,$query2);
			$query3=("select * from receipt where cust_mob='$mob';");
			$result3=pg_query($conn,$query3);
			$query4=("select * from service where cust_mob='$mob';");
			$result4=pg_query($conn,$query4);
			while($row=pg_fetch_array($result1))
			{
       				$name=$row['cust_name'];
       				$email=$row['cust_login'];
       				$address=$row['cust_add'];
       				$bike=$row['bike'];
       				$bike_status=$row['bill_status'];
       				$status=$row['status'];
				$bill_status=$row['bill_status'];
			}
			
			while($row=pg_fetch_array($result2)) 
			{
			      $plate=$row['plate_no'];
			      $company=$row['company'];
			}
			
			while($row=pg_fetch_array($result3)) 
			{
			     $receipt_no=$row['receipt_no'];
			     $total=$row['total_bill'];
			}
			
			while($row=pg_fetch_array($result4))
			{
			     $Dos=$row['dos'];
			     $serv=$row['serv_parts'];
			     $kms=$row['kms'];
			     $nxt=$row['nextser'];
			}
			echo"<br> customer details</br>";
			echo"<center><table border=2 class='content-table'><tr>";
			echo"<th>Name</th><th>Address</th><th>Email</th><th>Mobile</th>";
			echo"</tr><tr>";
			echo"<td>$name</td><td>$address</td><td>$email</td>Mobile<td>$mob</td>";   
			echo"</tr></table></center>"; 
			echo"<br><br><br><br>";
			echo"<br>vehicle Details</br>";
			echo"<table border=2 class='content-table2'><tr>";
			echo"<th>Number plate</th><th>Company</th>
			     <th>Bike Model</th><th>Total kms</th>
			      <th>Servicing part</th><th>Date of servicing</th><th>Next servicing kms</th>";
			echo"</tr><tr>";
			echo"<td>$plate</td><td>$company</td>
			     <td>$bike</td><td>$kms</td>
			     <td>$serv</td><td>$Dos</td><td>$nxt";
			echo"</tr></table>";
			echo"<br> Receipt</br>";
			echo"<table border=2 class='content-table3'><tr>";
			echo"<th>Receipt_no</th><th>Total amount</th>
			     <th>Bill_status</th><th>Progress status</th>";
			echo"</tr><tr>";
			echo"<td>$receipt_no</td><td>$total</td>
			     <td>$bill_status</td><td>$status</td>";
			echo"</tr></table>";
			?>
	
			<button type="submit" name="pgr" class="signout1">Update Progress</button><br> <br> 
			<button type="submit" name="bll" class="signout1">Update bill status</button><br> <br>
			<button type="submit" name="dos" class="signout1">Update next servicing</button><br><br>
			<?php
				if(isset($_POST['pgr']))
			{	
				
				$query4=("update customer set status=status+1 where cust_mob='$mob';");
				$result4=pg_query($conn,$query4);
		
				if(!$result4)
				{
					echo "<script>alert('progress not updated');</script>";
				}
				else if($result4==TRUE)
					echo "<script>alert('progress updated');</script>";
			}
				if(isset($_POST['bll']))
				{
					$query4=("update customer set bill_status=bill_status+1 where cust_mob='$mob';");
					$result4=pg_query($conn,$query4);
		
					if(!$result4)
					{
						echo "<script>alert('bill status not updated');</script>";
					}
					else if($result4==TRUE)
						echo "<script>alert('bill status updated');</script>";				

				}

			?>
			Servicing part--<input type="text" name="serv" />     <button type="submit" name="serv1"class="signout1">Update Servicing part</button><br> <br> 
			Total amount--<input type="text" name="bill"/>      <button type="submit" name="amt" class="signout1">Update amount part</button><br> <br> 
		
			<?php
			if(isset($_POST['serv1']))
			{	
				$ser=$_POST['serv'];
				$query1=("update service set serv_parts='$ser' where cust_mob='$mob';");
				$result1=pg_query($conn,$query1);
		
				if(!$result1)
				{
					echo "<script>alert('servicing part not updated');</script>";
				}
				else if($result1==TRUE)
					echo "<script>alert('servicing part updated');</script>";
			}


			if(isset($_POST['amt']))
			{	
				$q=("select bill_status from customer where bill_status=1");
				$bill=$_POST['bill'];
				$query2=("update receipt set total_bill=$bill where cust_mob='$mob';");
				$result2=pg_query($conn,$query2);
	
				if(!$result2)
				{
					echo "<script>alert('Bill amount not updated');</script>";
				}
				else if($result2==TRUE)
					echo "<script>alert('Bill amount updated');</script>";
			}


			if(isset($_POST['dos']))
			{	
				$ds=$_POST['date'];
				$query3=("update service set nextser=nextser+3000 where cust_mob='$mob';");
				$result3=pg_query($conn,$query3);
		
				if(!$result3)
				{
					echo "<script>alert('Next servicing kms  not updated');</script>";
				}
				else if($result3==TRUE)
					echo "<script>alert('Next servicing kms updated');</script>";
			}

			?>

				
</div>
	<div class="bt">
		<a href="index.php">BACK</a>
	</div>
	
   
</form>
</body>
</head>
</html>
