<?php session_start(); ?>
<div class="container">
  <p style="color:red"><?php if (isset($_SESSION['exist']))
  {
      echo $_SESSION['exist'];
      unset($_SESSION['exist']);
  } ?></p>
  <?php include('header.php'); ?>

<form method="post" name="customerData" action="addUser.php">
        <h2 class="my-3">Registration Form</h2>
        <div class="my-3">
          <p>
              <label for="name"> Name </label>
            <input type="text"  class="form-control" name="userName" placeholder="Mention your name" required />
          </p>
          <p>
              <label for="email"> Email </label>
            <input type="email"  class="form-control" name="userEmail" placeholder="Mention your email"/>
          </p>
          <p>
              <label for="number"> Phone  </label>
            <input type="number"  class="form-control" name="userNumber" placeholder="Mention your Phone Number"/>
          </p>
          <p>
              <label for="password"> Password </label>
            <input type="text"  class="form-control" name="userPass" placeholder="Mention your password"/>
          </p>
         
          <p>
            <input type="submit" name ="submit" class="btn btn-primary" value="SUBMIT" />
          </p>
          </div>
        </form>
        </div>