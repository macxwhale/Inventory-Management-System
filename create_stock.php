<?php 
// Set header title
$header_title = "Stocks";
// Set page title
$page_title = "Add Stock";
// include database and object files
include_once 'config/database.php';
include_once 'objects/stocks.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$stock = new Stock($db);

include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
 
  // set product property values
	$stock->Category= $_POST['Category'];
	$stock->Supplier_Number = $_POST['Supplier_Number'];
    $stock->Stock_Number = "SN" . rand();
    $stock->Stock_Name = $_POST['Stock_Name'];
	$stock->Unit_Of_Measurement = $_POST['Unit_Of_Measurement'];
	$stock->Purchasing_Price = $_POST['Purchasing_Price'];
	$stock->Selling_Price = $_POST['Selling_Price'];
	$stock->Quantity = $_POST['Quantity'];
	$stock->Notes = $_POST['Notes'];
	
 // create the product
  if($stock->create()){
    $current_url = "create_supplier.php";

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
    <label class="col-sm-4 control-label">Category</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Category"
    required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Supplier Number</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Supplier_Number"
    required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Stock Name</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Stock_Name" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Unit Of Measurement</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Unit_Of_Measurement" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Purchasing Price</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Purchasing_Price" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Selling Price</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Selling_Price" required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Quantity</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Quantity" required="required">
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Notes</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Notes" required="required">
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