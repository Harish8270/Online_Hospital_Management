<?php
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];

if(!empty($username)||!empty($email)||!empty($password)||!empty($confirm_password))
{
  $host="localhost";
  $dbUsername="root";
  $dbPassword="";
  $dbname="mini_project";
    $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
    if(mysqli_connect_error())
    {
      die('Connect Error('.mysqli_connect_err_no().')'.mysqli_connect_error());
    }
    else {

      $SELECT= "SELECT username From register Where username=? Limit 1"; 
      $INSERT = "INSERT Into register (username, email, password, confirm_password) values(?, ?, ?, ?)";
      //Prepare statement

    $stmt = $conn->prepare($SELECT);

    $stmt->bind_param("s", $username); 
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->store_result();
    $rnum=$stmt->num_rows;

    if ($rnum==0) {
$stmt->close();

$stmt = $conn->prepare($INSERT);

$stmt->bind_param("ssss", $username, $email, $password, $confirm_password);

$stmt->execute();
 echo "Registered sucessfully";
 header("Location:http://localhost/mini project/front.html"); 


} else {
header("location:http://localhost/mini%20project/login.html");
// echo "Email already exist";
}
$stmt->close();
$conn->close();
}
   }
else

{
  echo "All fields are required";
  die();
   }
  ?>