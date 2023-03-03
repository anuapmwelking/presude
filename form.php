<?php
session_start();
if(!isset($_SESSION['email'])){
  header('location:index.php');
}
?>
<?php include('header.php'); ?>
    <div class="container">
      <div class="py-5 text-center">
        <h2>Payment Form</h2>
      </div>
      <fieldset>
        
      <form method="post" name="customerData" action="ccavRequestHandler.php">
          <p>
            <!-- <label for="tid"> Transaction ID</label> -->
            <input type="hidden" class="form-control" name="tid" id="tid" value="<?php echo(rand(11111,99999)); ?>" readonly required />
          </p>
          <p>
            
            <input type="hidden" class="form-control" name="order_id" id="order_id" value="<?php echo(rand(11111,99999)); ?>" readonly required />
          </p>
          <p>
          <input  type="hidden" name="merchant_id" value="2071243"/>
          </p>
          <p>
            <label for="amount"> Amount </label>
            <input type="text"  class="form-control" name="amount" placeholder="Enter Amount" required/>
          </p>
          <p>
            <label for="reason"> Paying For </label>
            <input type="text" name="merchant_param1"  class="form-control"  placeholder="Enter Payment Details " required/>
          </p>

          <p>
            <label for="currency"> Currency </label>    

        <select class="form-select" name="currency" aria-label="Default select example">
  
            <option value="INR" selected='true'>Indian Rupees</option>
                <option value="USD">US Dollar</option>
                <option value="AUD">Australian Dollar</option>
                <option value="GBP">Pound Sterling</option>
            </select>
          </p>
          <p>
            <input type="hidden"  class="form-control" name="redirect_url" value="http://localhost/all_test_folder/presude/ccavResponseHandler.php" />
          </p>
          <p>
            <input type="hidden"  class="form-control" name="cancel_url" value="http://localhost/all_test_folder/presude/ccavRequestHandler.php" />
          </p>
          <p>
            <input type="hidden"  class="form-control" name="language" value="EN" />
          </p>
          <!-- <h3 for="name"> Billing Information: </h3> -->
          <p>
              
            <input type="hidden"  class="form-control" name="billing_name" placeholder="Mention your name" value="<?php echo $_SESSION['name']; ?>" required />
          </p>
          <p>
            
            <input type="hidden"  class="form-control"  name="billing_email" placeholder="Mention your email id" value="<?php echo $_SESSION['email']; ?>" required/>
          </p>
          <p>
           
            <input type="hidden"  class="form-control" name="billing_tel" placeholder="Mention contact number"  value="<?php echo $_SESSION['phone']; ?>"required required />
          </p>
          
          
          <p>&nbsp;</p>
          <p>
            <input TYPE="submit" class="btn btn-primary" value="SUBMIT" />
          
          </p>
        </form>
        
      </fieldset>
    </div>
  
  <script src="reg-form2.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"
  ></script>
<?php include('footer.php'); ?>
