<?php 
// page given in URL parameter, default page is one. This is for the pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set header title
$header_title = "Stock";
// Set page title
$page_title = "Stock";
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'config/database.php'; 
include_once 'objects/stocks.php'; 

// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$stock = new Stock($db);
 
// query products
$stmt = $stock->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

include_once'header.php';
include_once 'nav/side_nav.php';

      echo "<div class=\"w3-col m3 l3 \">";
      echo "<a href=\"create_stock.php\" class=\"w3-btn w3-blue w3-round\">Add Stock</a>";
      echo "</div>";
  echo '</div>'; // End Page title Div

  echo "<br>"; //Spacing

  // Table
  echo '<table class="w3-table w3-striped w3-bordered w3-border 
  w3-hoverable w3-white w3-card-4 w3-table-all">'; 

  if ($num>0) {
  echo 
    "<tr>
      <th>Supplier Number</th>
      <th>Stock Number</th>
      <th>Stock Name</th>
      <th>Purchasing Price</th>
      <th>Selling Price</th>
      <th>Quantity</th>
      <th>Action</th>
    </tr>";

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

  echo 
    "<tr>
      <td> {$Supplier_Number} </td>
      <td> {$Stock_Number} </td>
      <td> {$Stock_Name} </td>
      <td> {$Purchasing_Price} </td>
      <td> {$Selling_Price} </td>
      <td> {$Quantity}</td>
      <td>
        <a href='stock_detail.php?id={$Stock_Id}' class='w3-button w3-blue left-margin'>
        <span class='glyphicon glyphicon-list'></span> 
        </a>

        <a href='update_stock.php?id={$Stock_Id}' class='w3-button w3-green left-margin'>
        <span class='glyphicon glyphicon-edit'></span> 
        </a>

        <a delete-id='{$Stock_Id}' class='w3-button w3-red left-margin delete-object'>
        <span class='glyphicon glyphicon-remove'></span> 
        </a>
      </td>
    </tr>";
  }
  
$page_url = "read_stock.php?";
 
// count all products in the database to calculate total pages
$total_rows = $stock->countAll();

echo "</table><br>"; // End of Table

// paging buttons here
include_once 'paging.php';

echo "</div>";


} else {
  echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>No Stocks Found!!!</p>
      </div>";
}

include_once ('footer.php'); 
?>