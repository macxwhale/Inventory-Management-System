<?php 
// Set header title
$header_title = "Stock Category";
// Set page title
$page_title = "Add Stock Category";
// include database and object files
include_once 'config/database.php';
include_once 'objects/stock_categories.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$stock_cat = new Stock_Cat($db);

include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
 
  // set product property values
	$stock_cat->Category_Name = $_POST['Category_Name'];


    print_r($_POST);
	
 // create the product
  if($stock_cat->create()){

    echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Category was created</p>
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
    <label class="col-sm-4 control-label">Category Name</label>
    <div class="col-sm-8">
    <input class="form-control" id="focusedInput" type="text" name="Category_Name" required="required">
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