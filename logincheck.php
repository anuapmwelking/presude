<?php
session_start();

$con = mysqli_connect('localhost','root');
if($con){
    echo "connected";
}else{
    echo "error in connection";
}

$db = mysqli_select_db($con, 'presude_dashboard');

if(isset($_POST['submit'])){
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    $sql = "select * FROM users where email='$loginEmail' and password='$loginPassword'";

    $query = mysqli_query($con,$sql);

    $row = mysqli_num_rows($query);
        if($row ==1){
            echo "Login Successful";
            $_SESSION['email'] = $loginEmail;
            // $_SESSION['pass'] = $loginPassword;
            header('location:checkOrder.php');
            // header('location:index.php');

        }else {
            $_SESSION['failed']="Invalid Credentials";
            // echo "login failed";
            header('location:index.php');
        
    }

}
?>
