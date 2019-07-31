<?php 
// Set header title
$header_title = "Stock Categories";
// Set page title
$page_title = "Update Stock Categories";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/stock_categories.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$stock_cat = new Stock_Cat($db);
 
// set ID property of product to be read
$stock_cat->Category_ID = $id;
 
// read the details of product to be read
$stock_cat->readOne();


include_once'header.php';
include_once 'nav/side_nav.php';


// if the form was submitted - PHP OOP CRUD Tutorial
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
  // set product property values
	$stock_cat->Category_Name = $_POST['Category_Name'];
	
  print_r($_POST);
 
	if($stock_cat->update()){
      echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>Stock Category was updated</p>
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
action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$stock_cat->Category_ID}");?>" method="POST"> <!-- Form -->

<!-- <div class="form-group">
<label for="disabledInput" class="col-sm-4 control-label">Category</label>
<div class="col-sm-8">
<input class="form-control" id="disabledInput" type="text" name="" 
value="" disabled>
</div>
</div> -->

<div class="form-group">
<label class="col-sm-4 control-label">Category Name</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Category_Name" 
value="<?php echo $stock_cat->Category_Name;?>" 
required="required">
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