<?php 
// page given in URL parameter, default page is one. This is for the pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set header title
$header_title = "Stock Categories";
// Set page title
$page_title = "Stock Categories";

$page_link = "create_stock_cat.php";
$page_action = "Add Stock Category";
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'config/database.php'; 
include_once 'objects/stock_categories.php'; 

// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$stock_cat = new Stock_Cat($db);
 
// query products
$stmt = $stock_cat->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

include_once'header.php';
include_once 'nav/side_nav.php';

  // Table
  echo '<table class="w3-table w3-striped w3-bordered w3-border 
  w3-hoverable w3-white w3-card-4 w3-table-all">'; 

  if ($num>0) {
  echo 
    "<tr>
      <th>Category ID</th>
      <th>Category Name</th>
      <th>Action</th>
    </tr>";

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

  echo 
    "<tr>

      </td>
      <td> {$Category_ID} </td>
      <td> {$Category_Name} </td>
     
      <td>
        <a href='view_stock_cat.php?id={$Category_ID}' class='w3-button w3-blue left-margin w3-round'>
        <span class='glyphicon glyphicon-th-list'></span> 
        </a>

        <a href='update_stock_cat.php?id={$Category_ID}' class='w3-button w3-green left-margin w3-round'>
        <span class='glyphicon glyphicon-edit'></span> 
        </a>

       <a delete-id='{$Category_ID}' class='w3-button w3-red left-margin delete-object w3-round'>
        <span class='glyphicon glyphicon-trash'></span> 
        </a>
      </td>
    </tr>";
  }
  
$page_url = "read_stock_cat.php?";
 
// count all products in the database to calculate total pages
$total_rows = $stock_cat->countAll();

echo "</table><br>"; // End of Table

// paging buttons here
include_once 'paging.php';

} else {
  echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>No Stocks Found!!!</p>
      </div>";
}

include_once ('footer.php'); 
?>