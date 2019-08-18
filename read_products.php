<?php 
// page given in URL parameter, default page is one. This is for the pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set header title
$header_title = "Products";
// Set page title
$page_title = "Products";

$page_link = "create_product.php";
$page_action = "Add Product";
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'config/database.php'; 
include_once 'objects/products.php'; 

// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
 
// query products
$stmt = $product->read_all($from_record_num, $records_per_page);
$num = $stmt->rowCount();

include_once 'header.php';
include_once 'nav/side_nav.php';

  // Table
  echo '<table class="w3-table w3-striped w3-bordered w3-border 
  w3-hoverable w3-white w3-card-4 w3-table-all">'; 

  if ($num>0) {
  echo 
    "<tr>
      <th>Product UID</th>
      <th>Product Name</th>
      <th>Supplier Name</th>
      <th>Brand Name</th>
      <th>Quantity</th>
      <th>Buying Price</th>
      <th>Selling Price</th>
      <th>Profit</th>
      <th></th>
    </tr>";

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

  echo 
    "<tr>
      <td> {$Product_UID}</td>
      <td> {$Product_N}</td>
      <td> {$Supplier_Name}</td>
      <td> {$Brand_N}</td>
      <td> {$Quantity}</td>
      <td> {$Buying_Price}</td>
      <td> {$Selling_Price}</td>
      <td> {$Profit}</td>
      <td>

        <a href='view_product.php?id={$Product_ID}' class='w3-button w3-blue left-margin w3-round'>
        <span class='glyphicon glyphicon-list'></span> 
        </a> 

        <a href='update_product.php?id={$Product_ID}' class='w3-button w3-green left-margin w3-round'>
        <span class='glyphicon glyphicon-edit'></span> 
        </a>

        <a delete-id='{$Product_ID}' class='w3-button w3-red left-margin delete-object w3-round'>
        <span class='glyphicon glyphicon-remove'></span> 
        </a>

         
      </td>
    </tr>";
  }
  
$page_url = "read_products.php?";
 
// count all products in the database to calculate total pages
$total_rows = $product->count_all();

echo "</table><br>"; // End of Table

// paging buttons here
include_once 'paging.php';

 
} else {
  echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>Please Add Products!!!</p>
      </div>";
}

include_once ('footer.php'); 
?>