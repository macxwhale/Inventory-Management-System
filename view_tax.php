<?php 
// Set header title
$header_title = "Tax";
// Set page title
$page_title = "Tax Details";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/tax.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$tax = new Tax($db);
 
// set ID property of product to be read
$tax->Tax_ID = $id;
 
// read the details of product to be read
$tax->select_one();

include_once 'header.php'; 
include_once 'nav/side_nav.php'; 


echo 
"<table class=\"w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 w3-table-all\">

  <tr>
    <th class=\"w3-right-align\">Tax ID</th>
    <td>{$tax->Tax_ID}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Tax Name</th>
    <td>{$tax->Tax_N}</td>
  </tr>

   <tr>
    <th class=\"w3-right-align\">Tax Percentage</th>
    <td>{$tax->Tax_Percentage}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Created On</th>
    <td>{$tax->Created_On}</td>
  </tr>


  <tr>
    <th class=\"w3-right-align\">Created By</th>
    <td>{$tax->Created_By}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Updated On</th>
    <td>{$tax->Updated_On}</td>
  </tr>


  <tr>
    <th class=\"w3-right-align\">Updated By</th>
    <td>{$tax->Updated_By}</td>
  </tr>

  

</table><br>
<button class=\"w3-button w3-dark-grey\">More Countries  
<i class=\"fa fa-arrow-right\"></i></button>";
   

?>

<?php include ('footer.php'); ?>