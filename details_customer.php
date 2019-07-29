<?php 
// Set header title
$header_title = "Customers";
// Set page title
$page_title = "Customer Details";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/customers.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$customer = new Customer($db);
 
// set ID property of product to be read
$customer->Customer_Id = $id;
 
// read the details of product to be read
$customer->readOne();
include_once 'header.php'; 
include_once 'nav/side_nav.php'; 

echo 
"<table class=\"w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 w3-table-all\">

  <tr>
    <th class=\"w3-right-align\">Customer ID</th>
    <td>{$customer->Customer_Id}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Customer Number</th>
    <td>{$customer->Customer_Number}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Customer Name</th>
    <td>{$customer->Customer_Name}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Adresss </th>
    <td>{$customer->Address}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Contact_Person</th>
    <td>{$customer->Contact_Person}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Phone Number</th>
    <td>{$customer->Phone_Number}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Email</th>
    <td>{$customer->Email}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Mobile Number</th>
    <td>{$customer->Mobile_Number}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Notes</th>
    <td>{$customer->Notes}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Balance</th>
    <td>{$customer->Balance}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Date Added</th>
    <td>{$customer->Date_Added}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Added By</th>
    <td>{$customer->Added_By}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Date Updated</th>
    <td>{$customer->Date_Updated}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Updated By</th>
    <td>{$customer->Updated_By}</td>
  </tr>

</table><br>
<button class=\"w3-button w3-dark-grey\">More Countries  
<i class=\"fa fa-arrow-right\"></i></button>";
   

?>

<?php include ('footer.php'); ?>