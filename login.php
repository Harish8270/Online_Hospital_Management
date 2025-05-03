<?php
session_start(); // Starting Session

//if session exit, user nither need to signin nor need to signup
if(isset($_SESSION['login_id'])){
  if (isset($_SESSION['pageStore'])) {
//       $pageStore = $_SESSION['pageStore'];
// header("location: $pageStore"); // Redirecting To Profile Page
    }
}

//Login progess start, if user press the signin button
if (isset($_POST['signIn'])) {
if (empty($_POST['email']) && empty($_POST['password'])) {
echo "Username & Password should not be empty";
}
else
{

$email = $_POST['email'];
$password = $_POST['password'];

// Make a connection with MySQL server.
include('config.php');

$sQuery = "SELECT  password from register where email=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($sQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result( $hash);
$stmt->store_result();

if($stmt->fetch()) { 
  if (password_verify($password, $hash)) {
          $_SESSION['login_id'] = $username;

          if (isset($_SESSION['pageStore'])) {
            $pageStore = $_SESSION['pageStore'];
          }
          else {
            $pageStore = "register.php";
          }
          // header("location:http://localhost/mini%20project/front.html"); // Redirecting To Profile
          $stmt->close();
          $conn->close();

        }
else {
       // 
   header("location:http://localhost/mini%20project/front.html");
     }
      } else {
       // echo 'Invalid Username & Password';
         header("location:http://localhost/mini%20project/login.html");
     }
$stmt->close();
$conn->close(); // Closing database Connection
}
}
?>
