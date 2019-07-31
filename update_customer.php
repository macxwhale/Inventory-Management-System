<?php 
// Set header title
$header_title = "Customers";
// Set page title
$page_title = "Update Customer";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/customers.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$customer = new Customer($db);
 
// set ID property of product to be read
$customer->Customer_Id = $id;
 
// read the details of product to be read
$customer->readOne();


include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
  // set product property values
	//$customer->Customer_Name = $_POST['Customer_Name'];
	$customer->Address = $_POST['Address'];
	$customer->City = $_POST['City'];
	$customer->Country = $_POST['Country'];
	$customer->Contact_Person = $_POST['Contact_Person'];
  $customer->Customer_Type = $_POST['Customer_Type'];
	$customer->Phone_Number = $_POST['Phone_Number'];
	$customer->Email = $_POST['Email'];
	$customer->Mobile_Number = $_POST['Mobile_Number'];
	$customer->Notes = $_POST['Notes'];

  print_r($_POST);
 
	if($customer->update()){
      echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>Customer was updated</p>
      </div>";
    }
 
    // if unable to update the product, tell the user
    else{
      echo 
      "<div class=\"w3-panel w3-pale-ref w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>Update failed</p>
      </div>";
    }
  
} 

?>
 
<form class="form-horizontal" 
action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$customer->Customer_Id}");?>" method="POST"> <!-- Form -->

<div class="form-group">
<label for="disabledInput" class="col-sm-4 control-label">Customer Number</label>
<div class="col-sm-8">
<input class="form-control" id="disabledInput" type="text" name="" 
value="<?php echo $customer->Customer_Number;?>" disabled>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Customer Name</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="" 
value="<?php echo $customer->Customer_Name;?>" 
disabled>
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Address</label>
<div class="col-sm-8">
<textarea class="form-control" id="focusedInput" type="text" name="Address"
required="required"> <?php echo $customer->Address; ?>
</textarea>
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">City</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="City" value="<?php echo $customer->City;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Country</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Country" 
value="<?php echo $customer->Country;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Contact Person</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Contact_Person" value="<?php echo $customer->Contact_Person;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Customer Type</label>
<div class="col-sm-8">

<label class="checkbox-inline">
    <input type="radio" name="Customer_Type" value="Cash" 
    <?php if ($customer->Customer_Type == "Cash") echo "checked"; ?>> Cash
</label>

<label class="checkbox-inline">
    <input type="radio" name="Customer_Type" value="Credit"
    <?php if ($customer->Customer_Type == "Credit") echo "checked"; ?>> Credit
</label>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Phone Number</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Phone_Number" value="<?php echo $customer->Phone_Number;?>"required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Email</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Email" value="<?php echo $customer->Email;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Mobile Number</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Mobile_Number" value="<?php echo $customer->Mobile_Number;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Notes</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Notes" value="<?php echo $customer->Notes;?>"  required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label"></label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary" name="submit">Edit</button>
<button type="button" class="btn btn-danger">Cancel</button>
</div>
</div>	


</form> <!-- End of form -->



<?php include ('footer.php'); ?>