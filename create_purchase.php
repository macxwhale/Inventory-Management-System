<?php 
// Set header title
$header_title = "Purchases";
// Set page title
$page_title = "Add Purchases";
// include database and object files
include_once 'config/database.php';
include_once 'objects/purchases.php';
include_once 'objects/suppliers.php';
include_once 'objects/brands.php';
include_once 'objects/products.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$purchase = new Purchase($db);
$supplier = new Supplier($db);
$brand = new Brand($db);
$product = new Product($db);

$supplier_stmt = $supplier->read_all();
$supplier_num = $supplier_stmt->rowCount();

$brand_stmt = $brand->read_all();
$brand_num = $brand_stmt->rowCount();

$product_stmt = $product->select_all();
$product_num = $product_stmt->rowCount();



include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
 
  // set product property values
	$purchase->Purchase_Number = "PUN" . rand();
	$purchase->Purchase_Date = $_POST['Purchase_Date'];
	$purchase->Supplier_ID = $_POST['Supplier_ID'];
  $purchase->Brand_ID = $_POST['Brand_ID'];
  $purchase->Product_ID = $_POST['Product_ID'];
	$purchase->Total_Payment = $_POST['Total_Payment'];

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

if ($supplier_num == 0) {
    echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Please Add Suppliers first</p>
      </div>";
} else{
     include_once 'forms/add_purchase.php';
}



include ('footer.php'); 
?>