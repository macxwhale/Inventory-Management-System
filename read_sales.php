<?php 
// page given in URL parameter, default page is one. This is for the pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set header title
$header_title = "Sales";
// Set page title
$page_title = "Sales";

$page_link = "create_sales.php";
$page_action = "Add Sale";
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'config/database.php'; 
include_once 'objects/sales.php'; 

// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$sale = new Sale($db);
 
// query products
$stmt = $sale->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

include_once 'header.php';
include_once 'nav/side_nav.php';

  // Table
  echo '<table class="w3-table w3-striped w3-bordered w3-border 
  w3-hoverable w3-white w3-card-4 w3-table-all">'; 

  if ($num>0) {
  echo 
    "<tr>
      <th>Sale Number</th>
      <th>Sales Date</th>
      <th>Customer ID</th>
      <th>Total Amount</th>
      <th>Final Total Amount</th>
      <th>Total Payment</th>
      
      <th> Action</th>
    </tr>";

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

  echo 
    "<tr>
      <td> {$Sales_Number} </td>
      <td> {$Sales_Date} </td>
      <td> {$Customer_ID} </td>
      <td> {$Total_Amount} </td>
      <td> {$Final_Total_Amount} </td>
      <td> {$Total_Payment} </td>
    
      <td>
        <a href='view_sale.php?id={$Sales_ID}' class='w3-button w3-blue left-margin w3-round'>
        <span class='glyphicon glyphicon-list'></span> 
        </a>

        <a href='update_sale.php?id={$Sales_ID}' class='w3-button w3-green left-margin w3-round'>
        <span class='glyphicon glyphicon-edit'></span> 
        </a>

        <a delete-id='{$Sales_ID}' class='w3-button w3-red left-margin delete-object w3-round'>
        <span class='glyphicon glyphicon-remove'></span> 
        </a>
      </td>
    </tr>";
  }
  
$page_url = "read_sales.php?";
 
// count all products in the database to calculate total pages
$total_rows = $sale->countAll();

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