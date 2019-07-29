<?php 
// Set header title
$header_title = "Sales";
// Set page title
$page_title = "Add Sales";
// include database and object files
include_once 'config/database.php';
include_once 'objects/sales.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$sale = new Sale($db);

include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
 
  // set product property values
	$sale->Sales_Date= $_POST['Sales_Date'];
	$sale->Customer_ID = $_POST['Customer_ID'];
    $sale->Notes = $_POST['Notes'];
    $sale->Total_Amount = $_POST['Total_Amount'];
	$sale->Discount_Amount = $_POST['Discount_Amount'];
	$sale->Tax_Percentage = $_POST['Tax_Percentage'];
	$sale->Tax_Description = $_POST['Tax_Description'];
	$sale->Final_Total_Amount = $_POST['Final_Total_Amount'];
	$sale->Total_Payment = $_POST['Total_Payment'];
    $sale->Total_Balance = $_POST['Total_Balance'];

    print_r($_POST);
	
 // create the product
  if($sale->create()){
   
    echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Supplier was created</p>
      </div>";

    } else { // if unable to create the product, tell the user
    echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Unable to create Supplier! A Supplier with the specified Email address already exists</p>
      </div>";
  }
    
}

?>


  <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
    method="POST"> <!-- Form -->
    
    <!-- <div class="form-group">
      <label for="disabledInput" class="col-sm-4 control-label">Supplier Number</label>
      <div class="col-sm-8">
        <input class="form-control" id="disabledInput" type="text" 
        value="" name="Supplier_Number" disabled>
      </div>
    </div> -->

    <div class="form-group">
    <label class="col-sm-4 control-label">Sales Date</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Sales Date"
    required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Customer ID </label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Customer_ID"
    required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Notes</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Notes" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Total Amount</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Total_Amount" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label"> Discount Amount</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Discount_Amount" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Tax Percentage</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Tax_Percentage" required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Tax Description</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Tax_Description" required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Final Total Amount</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Final_Total_Amount" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Total Payment</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Total Payment" required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Total Balance</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Total_Balance" required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-4">
    <button type="submit" class="btn btn-primary" name="submit">Add</button>
    <button type="button" class="btn btn-danger">Cancel</button>
    </div>
    </div>  

  </form> <!-- End of form -->

<?php include ('footer.php'); ?>