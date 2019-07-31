<?php 
// Set header title
$header_title = "Purchases";
// Set page title
$page_title = "Purchase Details";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/purchases.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$purchase = new Purchase($db);
 
// set ID property of product to be read
$purchase->Purchase_ID = $id;
 
// read the details of product to be read
$purchase->readOne();

include_once 'header.php'; 
include_once 'nav/side_nav.php'; 

echo 
"<table class=\"w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 w3-table-all\">

  <tr>
    <th class=\"w3-right-align\">Purchase ID</th>
    <td>{$purchase->Purchase_ID}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Purchase Number</th>
    <td>{$purchase->Purchase_Number}</td>
  </tr>

   <tr>
    <th class=\"w3-right-align\">Purchase Date</th>
    <td>{$purchase->Purchase_Date}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Supplier ID </th>
    <td>{$purchase->Supplier_ID}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Notes </th>
    <td>{$purchase->Notes}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Total Amount </th>
    <td>{$purchase->Total_Amount}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Total Payment</th>
    <td>{$purchase->Total_Payment}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Total Balance</th>
    <td>{$purchase->Total_Balance}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">  Date Added</th>
    <td>{$purchase->Date_Added}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Added By</th>
    <td>{$purchase->Added_By}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Date Updated</th>
    <td>{$purchase->Date_Updated}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Updated By</th>
    <td>{$purchase->Updated_By}</td>
  </tr>

</table><br>
<button class=\"w3-button w3-dark-grey\">More Countries  
<i class=\"fa fa-arrow-right\"></i></button>";
   

?>

<?php include ('footer.php'); ?>