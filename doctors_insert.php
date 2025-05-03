<?php
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$department_id=$_POST['department_id'];
$specialist=$_POST['specialist'];
$date_of_join=$_POST['date_of_join'];
$date_of_retriement=$_POST['date_of_retriement'];
$dob=$_POST['dob'];
$age=$_POST['age'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$phone=$_POST['phone'];

if(!empty($first_name)||!empty($last_name)||!empty($department_id)||!empty($specialist)||!empty($date_of_join)||!empty($date_of_retriement)||!empty($dob)||!empty($age)||!empty($address)||!empty($city)||!empty($state)||!empty($phone))
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

      $SELECT= "SELECT first_name From doctors_details Where first_name=? Limit 1"; 
      $INSERT = "INSERT Into doctors_details (first_name, last_name, department_id, specialist, date_of_join,date_of_retriement,dob,age,address,city,state,phone) values(?, ?, ?, ?, ?,?,?,?,?,?,?,?)";
      //Prepare statement

    $stmt = $conn->prepare($SELECT);

    $stmt->bind_param("s", $first_name); 
    $stmt->execute();
    $stmt->bind_result($first_name);
    $stmt->store_result();
    $rnum=$stmt->num_rows;

    if ($rnum==0) {
$stmt->close();

$stmt = $conn->prepare($INSERT);

$stmt->bind_param("ssissssisssi", $first_name, $last_name, $department_id, $specialist, $date_of_join,$date_of_retriement,$dob,$age,$address,$city,$state,$phone);

$stmt->execute();
 echo "New record inserted sucessfully";
 header("Location:http://localhost/mini project/front.html"); 


} else {

echo "Registration not completed";
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
