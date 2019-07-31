<?php 
// Set header title
$header_title = "Stocks";
// Set page title
$page_title = "Stocks Details";
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

include_once 'header.php'; 
include_once 'nav/side_nav.php'; 


echo 
"<table class=\"w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 w3-table-all\">

  <tr>
    <th class=\"w3-right-align\">Category ID</th>
    <td>{$stock_cat->Category_ID}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Category Name</th>
    <td>{$stock_cat->Category_Name}</td>
  </tr>

</table><br>
<button class=\"w3-button w3-dark-grey\">More Countries  
<i class=\"fa fa-arrow-right\"></i></button>";
   

?>

<?php include ('footer.php'); ?>