<?php

session_start();
$_SESSION['login_status']=false;

$uemail=$_POST['uemail'];
$passwd=$_POST['passwd1'];

$conn=new mysqli("localhost","root","","game-zone",3306);

$sql_result=mysqli_query($conn,"select * from user_data where email='$uemail' and password='$passwd'");

$row=mysqli_fetch_assoc($sql_result);
$rows=mysqli_num_rows($sql_result);

if($rows>0){
   echo "Login Success"; 
   $_SESSION['login_status']=true;
   $_SESSION['uemail']=$row['uemail'];
   $_SESSION['passwd1']=$row['passwd1'];
    
    header("location:/Minor Project/index.html");
}
else{
    echo "Invalid Credentials";
}

?>