<?php 
// Set header title
$header_title = "Stocks";
// Set page title
$page_title = "Add Stock";
// include database and object files
include_once 'config/database.php';
include_once 'objects/stocks.php';
include_once 'objects/suppliers.php';
include_once 'objects/stock_categories.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$stock = new Stock($db);
$supplier = new Supplier($db);
$stock_cat = new Stock_Cat($db);

$supplier_stmt = $supplier->readName();
$supplier_num = $supplier_stmt->rowCount();

$stock_cat_stmt = $stock_cat->readName();
$stock_cat_num = $stock_cat_stmt->rowCount();

include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
 
  // set product property values
	$stock->Category= $_POST['Category'];
	$stock->Supplier_Number = $_POST['Supplier_Number'];
  $stock->Stock_Number = "STN" . rand();
  $stock->Stock_Name = $_POST['Stock_Name'];
	$stock->Unit_Of_Measurement = $_POST['Unit_Of_Measurement'];
	$stock->Purchasing_Price = $_POST['Purchasing_Price'];
	$stock->Selling_Price = $_POST['Selling_Price'];
	$stock->Quantity = $_POST['Quantity'];
	$stock->Notes = $_POST['Notes'];

  print_r($_POST);
	
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

// check if we have exisiting categories of suppliers the show the form
if ($stock_cat_num == 0 || $supplier_num == 0) {
    echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Please Add Stock categories or Suppliers first</p>
      </div>";
} else{
     include_once 'forms/add_stock.php';
}
  

include ('footer.php'); ?>