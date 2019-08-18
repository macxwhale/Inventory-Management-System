<?php 
// Set header title
$header_title = "Tax";
// Set page title
$page_title = "Add Tax";
// include database and object files
include_once 'config/database.php';
include_once 'objects/tax.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$tax = new Tax($db);

include_once'header.php';
include_once 'nav/side_nav.php';

// if the form was submitted - PHP OOP CRUD Tutorial
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
 
  // set product property values
    $tax->Tax_N = $_POST['Tax_N'];
    $tax->Tax_Percentage= $_POST['Tax_Percentage'];

    print_r($_POST);
    
  
 // create the product
  if($tax->create()){
   
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

include_once 'forms/add_tax.php';




include ('footer.php'); ?>