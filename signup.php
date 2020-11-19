<?php
$name=$_POST['nm'];
$address=$_POST['ad'];
$mob=$_POST['mob'];
$email=$_POST['email'];
$password=$_POST['pass'];
$bike=$_POST['bike'];
$plate_no=$_POST['plate'];
$company=$_POST['company'];
$date=$_POST['date'];
$kms=$_POST['kms'];

include("config.php");
if(isset($_POST('signup')))
{
      $query1=("insert into customer values('$mob','$email','$password','$name','$addres','$bike');");
     
      $query2=("insert into service values('$date','','$kms','$mob',$plate_no);");
      
      $result1=pg_query($conn,$query1);
      $result2=pg_query($conn,$query2);
      $result3=pg_query($conn,$query3);
          if($result1==FALSE||$result2==FALSE||$result3||FALSE)
          {
             echo"<script>alert('NOT submitted')</script>";
          }
          else
         {
             echo"<script>alert('Account registerd');</script>";
         }
}
?>

