<?php 
// Set header title
$header_title = "Stocks";
// Set page title
$page_title = "Update Stock";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/stocks.php';
include_once 'objects/stock_categories.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$stock = new Stock($db);
$stock_cat = new Stock_Cat($db);
 
// set ID property of product to be read
$stock->Stock_Id = $id;
 
// read the details of product to be read
$stock->readOne();

$stock_cat_stmt = $stock_cat->readName();
$stock_cat_num = $stock_cat_stmt->rowCount();


include_once'header.php';
include_once 'nav/side_nav.php';


// if the form was submitted - PHP OOP CRUD Tutorial
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
  // set product property values
	$stock->Category = $_POST['Category'];
	$stock->Supplier_Number = $_POST['Supplier_Number'];
	$stock->Stock_Number = $_POST['Stock_Number'];
  $stock->Stock_Name = $_POST['Stock_Name'];
	$stock->Unit_Of_Measurement = $_POST['Unit_Of_Measurement'];
	$stock->Purchasing_Price = $_POST['Purchasing_Price'];
	$stock->Selling_Price = $_POST['Selling_Price'];
	$stock->Quantity = $_POST['Quantity'];
	$stock->Notes = $_POST['Notes'];

 
	if($stock->update()){
      echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>Stock was updated</p>
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
action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$stock->Stock_Id}");?>" method="POST"> <!-- Form -->

<!-- <div class="form-group">
<label for="disabledInput" class="col-sm-4 control-label">Category</label>
<div class="col-sm-8">
<input class="form-control" id="disabledInput" type="text" name="" 
value="" disabled>
</div>
</div> -->


<div class="form-group">
<label class="col-sm-4 control-label">Category </label>
<div class="col-sm-8">
<?php if ($stock_cat_num>0) {?>
<select class="form-control" id="sel1" name="Category">
<?php 
    while ($st_row = $stock_cat_stmt->fetch(PDO::FETCH_ASSOC)){
    extract($st_row); 
        echo "<option value=\"{$Category_ID}\">{$Category_Name}</option>";
    
    }
}
?>   

</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Supplier Number</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Supplier_Number" 
value="<?php echo $stock->Supplier_Number;?>" 
required="required" disabled>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Stock Number</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Stock_Number" 
value="<?php echo $stock->Stock_Number;?>" required="required" disabled>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Stock Name</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Stock_Name" 
value="<?php echo $stock->Stock_Name;?>" required="required"> 
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Unit Of Measurement</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Unit_Of_Measurement" 
value="<?php echo $stock->Unit_Of_Measurement;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Purchasing Price</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Purchasing_Price" 
value="<?php echo $stock->Purchasing_Price;?>"required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Selling Price</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Selling_Price" value="<?php echo $stock->Selling_Price;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Quantity</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Quantity" value="<?php echo $stock->Quantity;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Notes</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Notes" value="<?php echo $stock->Notes;?>"  required="required">
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