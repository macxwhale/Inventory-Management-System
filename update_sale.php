<?php 
// Set header title
$header_title = "Sales";
// Set page title
$page_title = "Update Sales";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/sales.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$sale = new Sale($db);
 
// set ID property of product to be read
$sale->Sales_ID = $id;
 
// read the details of product to be read
$sale->readOne();


include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
  //$sale->Sales_ID = $_POST['Sales_ID'];
  $sale->Sales_Number = $_POST['Sales_Number'];
  $sale->Sales_Date = $_POST['Sales_Date'];
  $sale->Notes = $_POST['Notes'];
  $sale->Total_Amount = $_POST['Total_Amount'];
  $sale->Total_Payment = $_POST['Total_Payment'];
  $sale->Total_Balance = $_POST['Total_Balance'];
  $sale->Discount_Percentage = $_POST['Discount_Percentage'];
  $sale->Tax_Percentage = $_POST['Tax_Percentage'];
  $sale->Tax_Amount = $_POST['Tax_Amount'];
  $sale->Tax_Description = $_POST['Tax_Description'];
  $sale->Final_Total_Amount = $_POST['Final_Total_Amount'];

 
	if($sale->update()){
      echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>Sale was updated</p>
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
action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$sale->Sales_ID}");?>" method="POST"> 
<!-- Form -->

<div class="form-group">
<label for="disabledInput" class="col-sm-4 control-label">Sales ID</label>
<div class="col-sm-8">
<input class="form-control" id="disabledInput" type="text" name="" 
value="<?php echo $sale->Sales_ID;?>" disabled>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Sale Number</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Sales_Number" 
value="<?php echo $sale->Sales_Number;?>" 
required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Sale Date</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Sales_Date" value="<?php echo $sale->Sales_Date;?>" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Notes</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Notes" value="<?php echo $sale->Notes;?>" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Total Amount</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Total_Amount" value="<?php echo $sale->Total_Amount;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Discount Percentage</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Discount_Percentage" 
value="<?php echo $sale->Discount_Percentage;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Tax Percentage </label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Tax_Percentage" value="<?php echo $sale->Tax_Percentage;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Tax Amount</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Tax_Amount" value="<?php echo $sale->Tax_Amount;?>"required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Tax Description</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Tax_Description" value="<?php echo $sale->Tax_Description;?>"required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Final Total Amount</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Final_Total_Amount" value="<?php echo $sale->Final_Total_Amount;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Total Payment</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Total_Payment" value="<?php echo $sale->Total_Payment;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Total Balance</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Total_Balance" value="<?php echo $sale->Total_Balance;?>"  required="required">
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