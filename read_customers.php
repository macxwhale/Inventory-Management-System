<?php 
// page given in URL parameter, default page is one. This is for the pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set header title
$header_title = "Customers";
// Set page title
$page_title = "Customers";

$page_link = "create_customer.php";
$page_action = "Add Customer";
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'config/database.php'; 
include_once 'objects/customers.php'; 

// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$customer = new Customer($db);
 
// query products
$stmt = $customer->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

include_once 'header.php';
include_once 'nav/side_nav.php';

  // Table
  echo '<table class="w3-table w3-striped w3-bordered w3-border 
  w3-hoverable w3-white w3-card-4 w3-table-all">'; 

  if ($num>0) {
  echo 
    "<tr>
      <th>Customer Number</th>
      <th>Customer Name</th>
      <th>Contact Person</th>
      <th>Phone Number</th>
      <th>Mobile Number</th>
      <th>Balance</th>
      <th>Action</th>
    </tr>";

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

  echo 
    "<tr>
      <td> {$Customer_Number} </td>
      <td> {$Customer_Name} </td>
      <td> {$Contact_Person} </td>
      <td> {$Phone_Number} </td>
      <td> {$Mobile_Number}</td>
      <td> {$Balance} </td>
      <td>
        <a href='details_customer.php?id={$Customer_Id}' class='w3-button w3-blue left-margin'>
        <span class='glyphicon glyphicon-list'></span> 
        </a>

        <a href='update_customer.php?id={$Customer_Id}' class='w3-button w3-green left-margin'>
        <span class='glyphicon glyphicon-edit'></span> 
        </a>

        <a delete-id='{$Customer_Id}' class='w3-button w3-red left-margin delete-object'>
        <span class='glyphicon glyphicon-remove'></span> 
        </a>
      </td>
    </tr>";
  }
  
$page_url = "read_customers.php?";
 
// count all products in the database to calculate total pages
$total_rows = $customer->countAll();

echo "</table><br>"; // End of Table

// paging buttons here
include_once 'paging.php';


} else {
  echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>No Customers Found!!!</p>
      </div>";
}

include_once ('footer.php'); 
?>