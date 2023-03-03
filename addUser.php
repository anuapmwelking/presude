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

$userName = $_POST ['userName'];
$userNumber = $_POST ['userNumber'];
$userEmail = $_POST ['userEmail'];
$userPass = $_POST ['userPass'];

$sql = "INSERT INTO users (name ,email,phone, password) VALUES ('$userName','$userEmail','$userNumber','$userPass')";
// $sql = mysql_query("INSERT INTO users (name ,email,phone, password) VALUES ('$userName','$userEmail','$userNumber','$userPass')");

// if ($conn->query($sql) === TRUE) {
// //   echo "New record created successfully";
// $_SESSION['created']="Registration Successful!!";
// header('location:index.php');

// }
// else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// if (mysqli_errno() == 1062) {
//   print 'no way!';
// }

if(mysqli_query($conn,$sql)){
  echo "data inserted into DB<br>";                   
}else{
 if(mysqli_errno($conn) == 1062)
     echo "duplicate entry no need to insert into DB<br>";
 else
  echo "db insertion error:".$sql."<br>";

}

$conn->close();
?>
