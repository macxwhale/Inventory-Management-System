<?php 
// page given in URL parameter, default page is one. This is for the pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set header title
$header_title = "Purchases";
// Set page title
$page_title = "Purchases";

$page_link = "create_purchase.php";
$page_action = "Add Purchase";
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'config/database.php'; 
include_once 'objects/purchases.php'; 

// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$purchase = new Purchase($db);
 
// query products
$stmt = $purchase->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

include_once 'header.php';
include_once 'nav/side_nav.php';

  // Table
  echo '<table class="w3-table w3-striped w3-bordered w3-border 
  w3-hoverable w3-white w3-card-4 w3-table-all">'; 

  if ($num>0) {
  echo 
    "<tr>
      <th>Purchase Number</th>
      <th>Purchase Date</th>
      <th>Supplier ID</th>
      <th>Total Amount</th>
      <th>Total Payment</th>
      <th>Action</th>
    </tr>";

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

  echo 
    "<tr>
      <td> {$Purchase_Number} </td>
      <td> {$Purchase_Date} </td>
      <td> {$Supplier_ID}</td>
      <td> {$Total_Amount} </td>
      <td> {$Total_Payment} </td>
      <td>
        <a href='view_purchase.php?id={$Purchase_ID}' class='w3-button w3-blue left-margin w3-round'>
        <span class='glyphicon glyphicon-list'></span> 
        </a>

        <a href='update_purchase.php?id={$Purchase_ID}' class='w3-button w3-green left-margin w3-round'>
        <span class='glyphicon glyphicon-edit'></span> 
        </a>

        <a delete-id='{$Purchase_ID}' class='w3-button w3-red left-margin delete-object w3-round'>
        <span class='glyphicon glyphicon-remove'></span> 
        </a>
      </td>
    </tr>";
  }
  
$page_url = "read_purchases.php?";
 
// count all products in the database to calculate total pages
$total_rows = $purchase->countAll();

echo "</table><br>"; // End of Table

// paging buttons here
include_once 'paging.php';


} else {
  echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>No Purchases Found!!!</p>
      </div>";
}

include_once ('footer.php'); 
?>