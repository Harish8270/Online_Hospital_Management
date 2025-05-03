<?php
$name=$_POST['name'];
$father_name=$_POST['father_name'];
$dob=$_POST['dob'];
$age=$_POST['age'];
$specialist=$_POST['specialist'];
$time1=$_POST['time1'];
$time2=$_POST['time2'];
$ad1=$_POST['ad1'];
$ad2=$_POST['ad2'];
$city=$_POST['city'];
$state=$_POST['state'];
$phone=$_POST['phone'];

if(!empty($name)||!empty($father_name)||!empty($dob)||!empty($age)||!empty($specialist)||!empty($time1)||!empty($time2)||!empty($ad1)||!empty($ad2)||!empty($city)||!empty($state)||!empty($phone))
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

      $SELECT= "SELECT name From appointment Where name=? Limit 1"; 
      $INSERT = "INSERT Into appointment (name, father_name, dob, age, specialist,time1,time2,ad1,ad2,city,state,phone) values(?, ?, ?, ?, ?,?,?,?,?,?,?,?)";
      //Prepare statement

    $stmt = $conn->prepare($SELECT);

    $stmt->bind_param("s", $name); 
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->store_result();
    $rnum=$stmt->num_rows;

    if ($rnum==0) {
$stmt->close();

$stmt = $conn->prepare($INSERT);

$stmt->bind_param("sssisiissssi", $name, $father_name, $dob, $age, $specialist,$time1,$time2,$ad1,$ad2,$city,
	$state,$phone);

$stmt->execute();
 echo "New record inserted sucessfully";
 header("Location:http://localhost/mini project/specialization.html"); 


} else {

// echo "Registration not completed";
  header("Location:http://localhost/mini project/appointment.html");
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
