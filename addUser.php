<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "presude_dashboard";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
  $userName = $_POST ['userName'];
  $userNumber = $_POST ['userNumber'];
  $userEmail = $_POST ['userEmail'];
  $userPass = $_POST ['userPass'];

  $checkUser = "SELECT * from users where email = '$userEmail' ";
  $result = mysqli_query($conn,$checkUser);
  $count = mysqli_num_rows($result);
  if($count>0 ){
    echo "user signed up already";
    $_SESSION['exist']="User already Registered";
     header('location:register.php');
  }
  else{

    
    $sql = "INSERT INTO users (name ,email,phone, password) VALUES ('$userName','$userEmail','$userNumber','$userPass')";
    if($conn->query($sql)){
      // echo "user added";
      $_SESSION['created']="Registered Successfully";
      header('location:index.php');
    }
  }

}

$conn->close();
?>
