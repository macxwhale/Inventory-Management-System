<?php 
// Set header title
$header_title = "Brands";
// Set page title
$page_title = "Brand Details";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/brands.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$brand = new Brand($db);
 
// set ID property of product to be read
$brand->Brand_ID = $id;
 
// read the details of product to be read
$brand->select_one();

include_once 'header.php'; 
include_once 'nav/side_nav.php'; 


echo 
"<table class=\"w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 w3-table-all\">

  <tr>
    <th class=\"w3-right-align\">Brand UID</th>
    <td>{$brand->Brand_UID}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Brand Name</th>
    <td>{$brand->Brand_N}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Created On</th>
    <td>{$brand->Created_On}</td>
  </tr>


  <tr>
    <th class=\"w3-right-align\">Created By</th>
    <td>{$brand->Created_By}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Updated On</th>
    <td>{$brand->Updated_On}</td>
  </tr>


  <tr>
    <th class=\"w3-right-align\">Updated By</th>
    <td>{$brand->Updated_By}</td>
  </tr>

  

</table><br>
<button class=\"w3-button w3-dark-grey\">More Countries  
<i class=\"fa fa-arrow-right\"></i></button>";
   

?>

<?php include ('footer.php'); ?>