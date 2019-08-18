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
include_once 'objects/products.php';
include_once 'objects/customers.php';
include_once 'objects/tax.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$sale = new Sale($db);
$product = new Product($db);
$customer = new Customer($db);
$tax = new Tax($db);
 
// set ID property of product to be read
$sale->Sales_ID = $id;
 
// read the details of product to be read
$sale->readOne();

$c_stmt = $customer->read_all();
$c_num = $c_stmt->rowCount();

$p_stmt = $product->select_all();
$p_num = $p_stmt->rowCount();

$tax_stmt = $tax->read_all();
$tax_num = $tax_stmt->rowCount();



include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
  //$sale->Sales_ID = $_POST['Sales_ID'];
  //$sale->Sales_Number = $_POST['Sales_Number'];
  //$sale->Sales_Date = $_POST['Sales_Date'];
  $sale->Customer_ID = $_POST['Customer_ID'];
  $sale->Product_ID = $_POST['Product_ID'];
  $sale->Tax_ID = $_POST['Tax_ID'];
  $sale->Quantity = $_POST['Quantity'];
  $sale->Total_Payment = $_POST['Total_Payment'];
 
 print_r($_POST);
 
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
<label for="dtp_input1" class="col-sm-4 control-label">Sales Date</label> 
<div class="input-group date form_datetime col-md-4" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
<input class="form-control" size="16" type="text" value="<?php echo $sale->Sales_Date;?>" readonly>
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden" id="dtp_input1" value="" 
name=""/><br/>
</div>

<hr>

<div class="form-group">
<label for="disabledInput" class="col-sm-4 control-label">Sales ID</label>
<div class="input-group col-sm-4">
<input class="form-control" id="disabledInput" type="text" name="" 
value="<?php echo $sale->Sales_ID;?>" disabled>
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Sale Number</label>
<div class="input-group col-sm-4">
<input class="form-control" id="focusedInput" type="text" name="" 
value="<?php echo $sale->Sales_Number;?>" disabled>
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Customer Name</label>
<div class="input-group col-sm-4">
<?php if ($c_num>0) {?>
<select class="form-control" id="sel1" name="Customer_ID">
<?php 
    while ($c_row = $c_stmt->fetch(PDO::FETCH_ASSOC)){
    extract($c_row); 
        echo "<option value=\"{$Customer_ID}\">{$Customer_Name}</option>";
    
    }
}
?>   
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Product Name</label>
<div class="input-group col-sm-4">
<?php if ($p_num>0) {?>
<select class="form-control" id="sel1" name="Product_ID">
<?php 
    while ($p_row = $p_stmt->fetch(PDO::FETCH_ASSOC)){
    extract($p_row); 
        echo "<option value=\"{$Product_ID}\">{$Product_N}</option>";
    
    }
}
?>   
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Tax %</label>
<div class="input-group col-sm-4">
<?php if ($tax_num>0) {?>
<select class="form-control" id="sel1" name="Tax_ID">
<?php 
    while ($tax_row = $tax_stmt->fetch(PDO::FETCH_ASSOC)){
    extract($tax_row); 
        echo "<option value=\"{$Tax_ID}\">{$Tax_Percentage}</option>";
    
    }
}
?>   
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Quantity</label>
<div class="input-group col-sm-4">
<input class="form-control" id="focusedInput" type="number" name="Quantity" value="<?php echo $sale->Quantity;?>" required="required">
<span class="input-group-addon">KES</span>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Total Payment</label>
<div class="input-group col-sm-4">
<input class="form-control" id="focusedInput" type="number" name="Total_Payment" value="<?php echo $sale->Total_Payment;?>" required="required">
<span class="input-group-addon">KES</span>
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label"></label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary" name="submit">Edit</button>
<a href="/pos/read_sales.php"><button type="button" class="btn btn-danger">Cancel</button></a>
</div>
</div>	


</form> <!-- End of form -->



<?php include ('footer.php'); ?>