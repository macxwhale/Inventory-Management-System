<?php 
// Set header title
$header_title = "Tax";
// Set page title
$page_title = "Update Tax";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/tax.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$tax = new Tax($db);
 
// set ID property of product to be read
$tax->Tax_ID = $id;
 
// read the details of product to be read
$tax->select_one();


include_once'header.php';
include_once 'nav/side_nav.php';


// if the form was submitted - PHP OOP CRUD Tutorial
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
  // set product property values
	$tax->Tax_N = $_POST['Tax_N'];
  $tax->Tax_Percentage = $_POST['Tax_Percentage'];
	
  print_r($_POST);
 
	if($tax->update()){
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
action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$tax->Tax_ID}");?>" method="POST"> <!-- Form -->


<div class="form-group">
<label for="disabledInput" class="col-sm-4 control-label">Tax Name</label>
<div class="input-group col-sm-4">
<input class="form-control" id="disabledInput" type="text" name="Tax_N" 
value="<?php echo $tax->Tax_N;?>">
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Total Percentage</label>
<div class="input-group col-sm-4">
<input class="form-control" id="focusedInput" type="number" name="Tax_Percentage" min="1" max="100"
value="<?php echo $tax->Tax_Percentage;?>" required="required">
<span class="input-group-addon">%</span>
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