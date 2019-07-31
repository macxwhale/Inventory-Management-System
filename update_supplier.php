<?php 
// Set header title
$header_title = "Suppliers";
// Set page title
$page_title = "Update Supplier";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/suppliers.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$supplier = new Supplier($db);
 
// set ID property of product to be read
$supplier->Supplier_Id = $id;
 
// read the details of product to be read
$supplier->readOne();


include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
  // set product property values
	$supplier->Supplier_Name = $_POST['Supplier_Name'];
	$supplier->Address = $_POST['Address'];
	$supplier->City = $_POST['City'];
	$supplier->Country = $_POST['Country'];
	$supplier->Contact_Person = $_POST['Contact_Person'];
	$supplier->Phone_Number = $_POST['Phone_Number'];
	$supplier->Email = $_POST['Email'];
	$supplier->Mobile_Number = $_POST['Mobile_Number'];
	$supplier->Notes = $_POST['Notes'];

  print_r($_POST);
 
	if($supplier->update()){
      echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>Supplier was updated</p>
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
action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$supplier->Supplier_Id}");?>" method="POST"> <!-- Form -->

<div class="form-group">
<label for="disabledInput" class="col-sm-4 control-label">Supplier Number</label>
<div class="col-sm-8">
<input class="form-control" id="disabledInput" type="text" name="" 
value="<?php echo $supplier->Supplier_Number;?>" disabled>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Supplier Name</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Supplier_Name" 
value="<?php echo $supplier->Supplier_Name;?>" 
required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Address</label>
<div class="col-sm-8">
<textarea class="form-control" id="focusedInput" type="text" name="Address"
required="required"> <?php echo $supplier->Address; ?>
</textarea>
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">City</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="City" value="<?php echo $supplier->City;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Country</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Country" 
value="<?php echo $supplier->Country;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Contact Person</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Contact_Person" value="<?php echo $supplier->Contact_Person;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Phone Number</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Phone_Number" value="<?php echo $supplier->Phone_Number;?>"required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Email</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Email" value="<?php echo $supplier->Email;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Mobile Number</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Mobile_Number" value="<?php echo $supplier->Mobile_Number;?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Notes</label>
<div class="col-sm-8">
<input class="form-control" id="focusedInput" type="text" name="Notes" value="<?php echo $supplier->Notes;?>"  required="required">
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