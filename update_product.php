<?php 
// Set header title
$header_title = "Products";
// Set page title
$page_title = "Update Products";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/products.php';
include_once 'objects/suppliers.php';
include_once 'objects/brands.php';
include_once 'objects/tax.php';

 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$product = new Product($db);
$supplier = new Supplier($db);
$brand = new Brand($db);
$tax = new Tax($db);

// set ID property of product to be read
$product->Product_ID = $id;
 
// read the details of product to be read
$product->select_one();

$supplier_stmt = $supplier->read_all();
$supplier_num = $supplier_stmt->rowCount();

$brand_stmt = $brand->read_all();
$brand_num = $brand_stmt->rowCount();

$tax_stmt = $tax->read_all();
$tax_num = $tax_stmt->rowCount();

include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
  // set product property values
  //$customer->Customer_Name = $_POST['Customer_Name'];


    $product->Supplier_ID = $_POST['Supplier_ID'];
    $product->Brand_ID = $_POST['Brand_ID'];
    $product->Product_N = $_POST['Product_N'];
    $product->Quantity = $_POST['Quantity'];
    $product->Buying_Price = $_POST['Buying_Price'];
    $product->Total_Payment = $_POST['Total_Payment'];
    $product->Selling_Price = $_POST['Selling_Price'];
    $product->Profit = $_POST['Selling_Price'] - $_POST['Buying_Price'];
    $product->Balance = $_POST['Buying_Price'] - $_POST['Total_Payment'];

    if($product->Quantity == 0) {
      $product->In_Stock = "N";
    } else {
      $product->In_Stock = "Y";
    }
 
  if($product->update()){
      echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>Product was updated</p>
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
action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$product->Product_ID}");?>" method="POST"> <!-- Form -->


<div class="form-group">
<label for="disabledInput" class="col-sm-4 control-label">Product ID</label>
<div class="input-group col-sm-4">
<input class="form-control" id="disabledInput" type="text" name="" 
value="<?php echo $product->Product_ID;?>" disabled>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Product UID</label>
<div class="input-group col-sm-4">
<input class="form-control" id="focusedInput" type="text" name="" 
value="<?php echo $product->Product_UID;?>" 
disabled>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Supplier Name</label>
<div class="input-group col-sm-4">
<?php if ($supplier_num>0) {?>
<select class="form-control" id="sel1" name="Supplier_ID">
<?php 
    while ($s_row = $supplier_stmt->fetch(PDO::FETCH_ASSOC)){
    extract($s_row); 
        echo "<option value=\"{$Supplier_ID}\">{$Supplier_Name}</option>";
    
    }
}
?>   
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Brand Name</label>
<div class="input-group col-sm-4">
<?php if ($brand_num>0) {?>
<select class="form-control" id="sel1" name="Brand_ID">
<?php 
    while ($b_row = $brand_stmt->fetch(PDO::FETCH_ASSOC)){
    extract($b_row); 
        echo "<option value=\"{$Brand_ID}\">{$Brand_N}</option>";
    
    }
}
?>   
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Product Name</label>
<div class="input-group col-sm-4">
<input class="form-control" id="focusedInput" type="text" name="Product_N" 
value="<?php echo $product->Product_N;?>">
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Quantity</label>
<div class="input-group col-sm-4">
<input class="form-control" id="focusedInput" type="number" name="Quantity" min="0" max="50000000"
value="<?php echo $product->Quantity;?>" required="required">
<span class="input-group-addon">KES</span>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Buying Price</label>
<div class="input-group col-sm-4">
<input class="form-control" id="focusedInput" type="number" name="Buying_Price" min="1" max="50000000"
value="<?php echo $product->Buying_Price;?>" required="required">
<span class="input-group-addon">KES</span>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Total Payment</label>
<div class="input-group col-sm-4">
<input class="form-control" id="focusedInput" type="number" name="Total_Payment" min="1" max="50000000"
value="<?php echo $product->Buying_Price;?>" required="required">
<span class="input-group-addon">KES</span>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Selling Price</label>
<div class="input-group col-sm-4">
<input class="form-control" id="focusedInput" type="number" name="Selling_Price" min="1" max="50000000"value="<?php echo $product->Selling_Price;?>" required="required">
<span class="input-group-addon">KES</span>
</div>
</div>



<!-- <div class="form-group">
<label class="col-sm-4 control-label">In Stock</label>
<div class="col-sm-8">
<label class="checkbox-inline">
    <input type="radio" name="In_Stock" 
    <?php //if ($product->In_Stock == "Y") echo "checked"; ?> value="Y">YES
</label>

<label class="checkbox-inline">
    <input type="radio" name="In_Stock" 
    <?php //if ($product->In_Stock == "N") echo "checked"; ?> value="N">NO
</label>
</div>
</div> -->


<div class="form-group">
<label class="col-sm-4 control-label"></label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary" name="submit">Edit</button>
<a href="/pos/read_products.php"><button type="button" class="btn btn-danger">Cancel</button></a>
</div>
</div>  


</form> <!-- End of form -->



<?php include ('footer.php'); ?>