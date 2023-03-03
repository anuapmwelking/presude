<?php
session_start();
if(!isset($_SESSION['email'])){
  header('location:index.php');
}
?>
<?php include('header.php'); ?>
<div class="container">
<a href="form.php"><input type="submit" class="btn btn-primary" value="Pay Fee" /></a>
<a href="logout.php"><button class="btn-danger " style="float: right;
    margin-right: 37px;
    padding: 8px;
    border-radius: 4px;" >Logout</button></a>
<?php
// session_start();
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
$query = "SELECT name,email,phone,password FROM users";
$result1 = $conn->query($query);

$sql = "SELECT billing_email,billing_name,order_id,amount FROM payments";
$result = $conn->query($sql);

//for retreiving data from users table and setting the session parametere
if($result1->num_rows>0 ){
  while($row1 = $result1->fetch_assoc()) {
    // if($row1["billing_email"]== $_SESSION['email']){
      $_SESSION['name'] = $row1["name"];
      $_SESSION['phone'] = $row1["phone"];
      // $_SESSION['name'] = $row1["name"];

    // }
  }
}

//for showing result on chechOrder page
if ($result->num_rows > 0) {
  echo "<table class='table table-striped'>
  <thead>
    <tr>
     
      <th scope='col'>Order_id</th>
      <th scope='col'>Name</th>
      <th scope='col'>Amount Paid</th>

    </tr>
  </thead>
  <tbody>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION['sessName'] = $row['billing_name'];
    if($row["billing_email"]== $_SESSION['email']){
      echo "  <tr>
      <td>".$row['order_id']."</td>
      <td>".$row['billing_name']."</td>
      <td>".$row['amount']."</td>
    </tr>"; 
  ?>
  <?php
    }
  } echo " </tbody>
  </table>";
}
else {
  echo "<br> <br> <h3>No Previous Transaction Found</h3>";
}

$conn->close();
?>
  </div>
<?php include('footer.php'); ?>