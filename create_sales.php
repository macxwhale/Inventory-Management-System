<?php 
// Set header title
$header_title = "Sales";
// Set page title
$page_title = "Add Sales";
// include database and object files
include_once 'config/database.php';
include_once 'objects/sales.php';
include_once 'objects/customers.php';
include_once 'objects/products.php';
include_once 'objects/tax.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$sale = new Sale($db);
$customer = new Customer($db);
$product = new Product($db);
$tax = new Tax($db);

$c_stmt = $customer->read_all();
$c_num = $c_stmt->rowCount();

$p_stmt = $product->select_all();
$p_num = $p_stmt->rowCount();

$t_stmt = $tax->read_all();
$t_num = $t_stmt->rowCount();




include_once'header.php';
include_once 'nav/side_nav.php';



if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST["Sales_Date"])){
      echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Expiry date Empty</p>
      </div>";
  }


// if the form was submitted - PHP OOP CRUD Tutorial
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST) &&!empty($_POST["Sales_Date"])){

  $product->Product_ID = $_POST['Product_ID'];
  $tax->Tax_ID = $_POST['Tax_ID'];
  // read the details of product to be read
  $product->select_one();
  $tax->select_one();

  if ($_POST['Quantity'] > $product->Quantity) {
     echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Quantity has to be less</p>
      </div>";

  } else {




    //$product->update();
 
  // set product property values
    $sale->Sales_Number = "SAN" . rand();
    $sale->Sales_Date= $_POST['Sales_Date'];
    $sale->Quantity = $_POST['Quantity'];
    $sale->Customer_ID = $_POST['Customer_ID'];
    $sale->Payment_Type = $_POST['Payment_Type'];
    $sale->Product_ID = $_POST['Product_ID'];
    $sale->Tax_ID = $_POST['Tax_ID'];
    $sale->Total_Payment = $_POST['Total_Payment'];

    $tax = ($product->Selling_Price * $tax->Tax_Percentage / 100);

    $sale->Total_Amount = ($sale->Quantity * $product->Selling_Price) + $tax;
    $sale->Total_Balance = $sale->Total_Amount - $sale->Total_Payment;

    $sale->Profit = $sale->Quantity * ($product->Buying_Price - $sale->Total_Amount);
    
    
    $product->Quantity = $product->Quantity - $sale->Quantity;
    if($product->Quantity == 0) {
      $product->In_Stock = 'N';
    } else {
       $product->In_Stock = 'Y';
    }

    if ($product->update_q()) {
      echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Quantity was created</p>
      </div>";
    }



    //$sale->Discount_Amount = $_POST['Discount_Amount'];
    //$sale->Tax_Percentage = $_POST['Tax_Percentage'];
    //$sale->Tax_Description = $_POST['Tax_Description'];
    //$sale->Final_Total_Amount = $_POST['Final_Total_Amount'];
    ///$sale->Total_Payment = $_POST['Total_Payment'];
    //$sale->Total_Balance = $_POST['Total_Balance'];
      // set ID property of product to be read

	
 // create the product
  if($sale->create()){

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
}


if ($c_num == 0) {
  echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Please add Customers first</p>
      </div>";
} elseif ($p_num == 0) {
  echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Please add Products first</p>
      </div>";
} elseif ($t_num == 0) {
 echo 
      "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
        <h3>Alert!</h3>
        <p>Please add Tax first</p>
      </div>";
} else {
  include_once 'forms/add_sales.php';
}


include ('footer.php'); ?>