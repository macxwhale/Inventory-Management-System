<?php 
// Set header title
$header_title = "Customers";
// Set page title
$page_title = "Add Customer";
// include database and object files
include_once 'config/database.php';
include_once 'objects/customers.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$customer = new customer($db);

include_once'header.php';
include_once 'nav/side_nav.php';


// if the form was submitted - PHP OOP CRUD Tutorial
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
 
  // set product property values
	$customer->Customer_Number = "CUN" . rand();
	$customer->Customer_Name = $_POST['Customer_Name'];
	$customer->Address = $_POST['Address'];
	$customer->City = $_POST['City'];
	$customer->Country = $_POST['Country'];
	$customer->Contact_Person = $_POST['Contact_Person'];
    $customer->Customer_Type = $_POST['Customer_Type'];
	$customer->Phone_Number = $_POST['Phone_Number'];
	$customer->Email = $_POST['Email'];
	$customer->Mobile_Number = $_POST['Mobile_Number'];


 // create the product
  if($customer->create()){
   

    echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Customer was created</p>
      </div>";

    } else { // if unable to create the product, tell the user
    echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Unable to create customer! A Customer with the specified Email address already exists</p>
      </div>";
  }
    
} 

?>

 
  <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
    method="POST"> <!-- Form -->
    
    <!-- <div class="form-group">
      <label for="disabledInput" class="col-sm-4 control-label">Customer Number</label>
      <div class="col-sm-8">
        <input class="form-control" id="disabledInput" type="text" 
        value="" name="Customer_Number" disabled>
      </div>
    </div> -->

    <div class="form-group">
    <label class="col-sm-4 control-label">Customer Name</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Customer_Name"
    required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Address</label>
    <div class="col-sm-8">
    <textarea class="form-control" id="focusedInput" type="text" name="Address"></textarea
    required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">City</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="City" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Country</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Country" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Contact Person</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Contact_Person" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Customer Type</label>
    <div class="col-sm-8">
    <label class="checkbox-inline">
        <input type="radio" name="Customer_Type" required
        <?php if (isset($customer_type) && $customer_type == "Cash") echo "checked"; ?> value="Cash"> 
        Cash
    </label>

    <label class="checkbox-inline">
        <input type="radio" name="Customer_Type" required
        <?php if (isset($customer_type) && $customer_type == "Credit") echo "checked"; ?> value="Credit"> Credit
    </label>
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Phone Number</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Phone_Number" required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Email</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Email" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Mobile Number</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Mobile_Number" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-4">
    <button type="submit" class="btn btn-primary" name="submit">Add</button>
    <a href="/pos/read_customers.php"><button type="button" class="btn btn-danger">Cancel</button></a>
    </div>
    </div>	

  </form> <!-- End of form -->

<?php include ('footer.php'); ?>