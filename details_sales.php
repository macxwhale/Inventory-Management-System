<?php 
// Set header title
$header_title = "Sales";
// Set page title
$page_title = "Sales Details";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/sales.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$sale = new Sale($db);
 
// set ID property of product to be read
$sale->Sales_ID = $id;
 
// read the details of product to be read
$sale->readOne();

include_once 'header.php'; 
include_once 'nav/side_nav.php'; 

echo 
"<table class=\"w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 w3-table-all\">

  <tr>
    <th class=\"w3-right-align\">Sale ID</th>
    <td>{$sale->Sales_ID}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Sales Number</th>
    <td>{$sale->Sales_Number}</td>
  </tr>

   <tr>
    <th class=\"w3-right-align\">Sales Date</th>
    <td>{$sale->Sales_Date}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Customer ID </th>
    <td>{$sale->Customer_ID}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Notes </th>
    <td>{$sale->Notes}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Total Amount </th>
    <td>{$sale->Total_Amount}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Total Payment</th>
    <td>{$sale->Total_Payment}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Total Balance</th>
    <td>{$sale->Total_Balance}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Discount Type</th>
    <td>{$sale->Discount_Type}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Discount Percentage</th>
    <td>{$sale->Discount_Percentage}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Discount Amount</th>
    <td>{$sale->Discount_Amount}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Tax Percentage</th>
    <td>{$sale->Tax_Percentage}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">  Tax Amount</th>
    <td>{$sale->Tax_Amount}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">  Tax Description</th>
    <td>{$sale->Tax_Description}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Final Total Amount</th>
    <td>{$sale->Final_Total_Amount}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">  Date Added</th>
    <td>{$sale->Date_Added}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Added By</th>
    <td>{$sale->Added_By}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Date Updated</th>
    <td>{$sale->Date_Updated}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Updated By</th>
    <td>{$sale->Updated_By}</td>
  </tr>

</table><br>
<button class=\"w3-button w3-dark-grey\">More Countries  
<i class=\"fa fa-arrow-right\"></i></button>";
   

?>

<?php include ('footer.php'); ?>