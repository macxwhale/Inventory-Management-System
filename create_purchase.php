<?php 
// Set header title
$header_title = "Purchases";
// Set page title
$page_title = "Add Purchases";
// include database and object files
include_once 'config/database.php';
include_once 'objects/purchases.php';
include_once 'objects/suppliers.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$purchase = new Purchase($db);
$supplier = new Supplier($db);

$supplier_stmt = $supplier->readName();
$supplier_num = $supplier_stmt->rowCount();

include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
 
  // set product property values
	$purchase->Purchase_Number = "PUN" . rand();
	$purchase->Purchase_Date = $_POST['Purchase_Date'];
	$purchase->Supplier_ID = $_POST['Supplier_ID'];
	$purchase->Notes = $_POST['Notes'];
	$purchase->Total_Amount = $_POST['Total_Amount'];
	$purchase->Total_Payment = $_POST['Total_Payment'];
	$purchase->Total_Balance = $_POST['Total_Balance'];

  print_r($_POST);
	
 // create the product
  if($purchase->create()){

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
    <label class="col-sm-4 control-label">Purchase Date</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Purchase_Date"
    required="required">
    </div>
    </div>


      <div class="form-group">
    <label class="col-sm-4 control-label">Supplier Number</label>
    <div class="col-sm-8">
    <?php if ($supplier_num>0) {?>
    <select class="form-control" id="sel1" name="Supplier_ID">
    <?php 
        while ($s_row = $supplier_stmt->fetch(PDO::FETCH_ASSOC)){
        extract($s_row); 
            echo "<option value=\"{$Supplier_Number}\">{$Supplier_Name}</option>";
        
        }
    }
    ?>   
    </select>
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
    <label class="col-sm-4 control-label"> Total Payment</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Total_Payment" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label"> Total Balance</label>
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