<?php 
// Set header title
$header_title = "Products";
// Set page title
$page_title = "Add Products";
// include database and object files
include_once 'config/database.php';
include_once 'objects/products.php';
include_once 'objects/suppliers.php';
include_once 'objects/brands.php';


// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$product = new Product($db);
$supplier = new Supplier($db);
$brand = new Brand($db);

$s_stmt = $supplier->read_all();
$s_num = $s_stmt->rowCount();

$b_stmt = $brand->read_all();
$b_num = $b_stmt->rowCount();


include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST) && !empty($_POST["Expiry_Date"])){
 
  // set product property values
    $product->Product_UID = "PUID" . rand();
    $product->Supplier_ID = $_POST['Supplier_ID'];
    $product->Expiry_Date = $_POST['Expiry_Date'];
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
	
 // create the product
  if($product->create()){
   
    echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Product was created</p>
      </div>";

    } else { // if unable to create the product, tell the user
    echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Unable to create Product!</p>
      </div>";
  }
    
} 




// check if we have exisiting suppliers
if ($s_num == 0) {
    echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Please Add Suppliers first</p>
      </div>";
} elseif ($b_num == 0) {
   echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Please Add Brands first</p>
      </div>";
    
} else {
    include_once 'forms/add_product.php';
}



include ('footer.php'); ?>