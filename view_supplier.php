<?php 
// Set header title
$header_title = "Suppliers";
// Set page title
$page_title = "Supplier Details";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/suppliers.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$supplier = new Supplier($db);
 
// set ID property of product to be read
$supplier->Supplier_Id = $id;
 
// read the details of product to be read
$supplier->readOne();

include_once 'header.php'; 
include_once 'nav/side_nav.php'; 

echo 
"<table class=\"w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 w3-table-all\">

  <tr>
    <th class=\"w3-right-align\">Supplier ID</th>
    <td>{$supplier->Supplier_Id}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Supplier Number</th>
    <td>{$supplier->Supplier_Number}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Supplier Name</th>
    <td>{$supplier->Supplier_Name}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Adresss </th>
    <td>{$supplier->Address}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Contact Person</th>
    <td>{$supplier->Contact_Person}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Phone Number</th>
    <td>{$supplier->Phone_Number}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Email</th>
    <td>{$supplier->Email}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Mobile Number</th>
    <td>{$supplier->Mobile_Number}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Notes</th>
    <td>{$supplier->Notes}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Balance</th>
    <td>{$supplier->Balance}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Date Added</th>
    <td>{$supplier->Date_Added}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Added By</th>
    <td>{$supplier->Added_By}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Date Updated</th>
    <td>{$supplier->Date_Updated}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Updated By</th>
    <td>{$supplier->Updated_By}</td>
  </tr>

</table><br>
<button class=\"w3-button w3-dark-grey\">More Countries  
<i class=\"fa fa-arrow-right\"></i></button>";
   

?>

<?php include ('footer.php'); ?>