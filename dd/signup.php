<html>
<head>
<link rel="stylesheet" href="signup111.css"/>
<body>
<a class="back" href="index.php">Back</a>
<div class='sg'>
<div >
<img class='i' src="logo.jpg"/>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class='sgp'><b>Signup</b></button>

</div>
</div>
<div id="id01" class="modal">
	<span onclick="document.getElementById('id01').style.display='none'" class="close" title="CloseModal">&times;</span>
	<form class="modal-content" method="post" action="<?php PHP_SELF?>" method="post">
	<div class="container">
		<h1>Sign Up</h1>
		<p>Please fill in this form to create an account</p>

		<hr>
		<label for="name"><b>Name</b></label>
		<input type="text" placeholder="Name" name="nm" required>
		<label for="address"><b>Address</b></label>
		<input type="text" placeholder="Address" name="ad" required>
		<label for="mobile"><b>Mobile No.</b></label>
		<input type="text" placeholder="MobileNo." name="mob" required>
		<label for="numberplate"><b>Number Plate</b></label>
		<input type="text" placeholder="Number Plate" name="plate" required>
		<label for="bike"><b>Bike Company</b></label>
                <input type="text" placeholder="Company" name="company" required>
		<label for="email"><b>Email</b></label>
                <input type="email" placeholder="Email" name="email" required>
		<label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Password" name="psw" required>
		<label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
		<label for="bike model"><b>Bike Model</b></label>
                <input type="text" placeholder="Bike Model" name="model" required>
		<label for="kms"><b>Bike kms</b></label>
                <input type="text" placeholder="Kms run" name="kms" required>
		<label for="Dos"><b>Date of servicing</b></label>
                <select name="date"><option value="1">1</option>
				    <option value="2">2</option>
				    <option value="3">3</option>	    
				    <option value="4">4</option>		   
				    <option value="5">5</option>
			            <option value="6">6</option>
				    <option value="7">7</option>
				    <option value="8">8</option>			    
				    <option value="9">9</option>			   
				    <option value="10">10</option>
			            <option value="11">11</option>
				    <option value="12">12</option>
				    <option value="13">13</option>			    
				    <option value="14">14</option>			   
				    <option value="15">15</option>
			            <option value="16">16</option>
		 		    <option value="17">17</option>
				    <option value="18">18</option>			    
				    <option value="19">19</option>		   
				    <option value="20">20</option>
			            <option value="21">21</option>
		 		    <option value="22">22</option>
				    <option value="23">23</option>			    
				    <option value="24">24</option>				   
				    <option value="25">25</option>
			            <option value="26">26</option>
				    <option value="27">27</option>
				    <option value="28">28</option>			    
				    <option value="29">29</option>			   
				    <option value="30">30</option>
			            <option value="31">31</option>
				</select>
		


		
		 <select name="month"><option value="1">1</option>
				    <option value="2">2</option>
				    <option value="3">	3</option>			    
				    <option value="4">	4</option>			   
				    <option value="5">5</option>
			            <option value="6">6</option>
				    <option value="7">7</option>
				    <option value="8">8	</option>			    
				    <option value="9">	9</option>			   
				    <option value="10">10</option>
			            <option value="11">11</option>
				    <option value="12">12</option>
		</select>
		<select name="year" ><option value="2019">2019</option></select>
		<label>
		
		<div class="clearfix">
			<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		<button type="submit" class="signupbtn" name="signup">Sign Up</button>
		</div>
	</div>
	
	</form>
</div>
</body>
</html>



<?php
$name=$_POST['nm'];
$address=$_POST['ad'];
$mob=$_POST['mob'];
$email=$_POST['email'];
$password=$_POST['psw'];
$bike=$_POST['model'];
$plate_no=$_POST['plate'];
$company=$_POST['company'];
$date=$_POST['date'];
$month=$_POST['month'];
$year=$_POST['year'];
$kms=$_POST['kms'];
$arr=array($year,$month,$date);
$date1=implode("/",$arr);

include("config.php");
if(isset($_POST['signup']))
{
      $query1=("insert into customer values('$mob','$email','$password','$name','$address','$bike',0,0,'a');");
     
      $query2=("insert into service values('$date1','','','$kms','$mob','$plate_no');");
      $query3=("insert into vehicle values('$plate_no','$company','$mob');");
      $result1=pg_query($conn,$query1);
      $result3=pg_query($conn,$query3);
      $result2=pg_query($conn,$query2);
          if(!$result1||!$result3||!$result2)
          {
             echo"<script>alert('NOT submitted');</script>";
          }
          else
         {
             echo"<script>alert('Account registerd');</script>";
         }
}
?>


