<?php 
// Set header title
$header_title = "Stocks";
// Set page title
$page_title = "Stocks Details";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/stocks.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$stock = new Stock($db);
 
// set ID property of product to be read
$stock->Stock_Id = $id;
 
// read the details of product to be read
$stock->readOne();

include_once 'header.php'; 
include_once 'nav/side_nav.php'; 

echo '</div>'; // End Page title Div
echo "<br>"; //Spacing

echo 
"<table class=\"w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 w3-table-all\">

  <tr>
    <th class=\"w3-right-align\">Stock ID</th>
    <td>{$stock->Stock_Id}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Category</th>
    <td>{$stock->Category}</td>
  </tr>

   <tr>
    <th class=\"w3-right-align\">Supplier Number</th>
    <td>{$stock->Supplier_Number}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Stock Number</th>
    <td>{$stock->Stock_Number}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Stock Name</th>
    <td>{$stock->Stock_Name}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Unit Of Measurement </th>
    <td>{$stock->Unit_Of_Measurement}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Purchasing Price</th>
    <td>{$stock->Purchasing_Price}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Selling Price</th>
    <td>{$stock->Selling_Price}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Quantity</th>
    <td>{$stock->Quantity}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Notes</th>
    <td>{$stock->Notes}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Date Added</th>
    <td>{$stock->Date_Added}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Added By</th>
    <td>{$stock->Added_By}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Date Updated</th>
    <td>{$stock->Date_Updated}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Updated By</th>
    <td>{$stock->Updated_By}</td>
  </tr>

</table><br>
<button class=\"w3-button w3-dark-grey\">More Countries  
<i class=\"fa fa-arrow-right\"></i></button>";
   

?>

<?php include ('footer.php'); ?>