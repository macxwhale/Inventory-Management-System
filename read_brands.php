<?php 
// page given in URL parameter, default page is one. This is for the pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set header title
$header_title = "Brands";
// Set page title
$page_title = "Brands";

$page_link = "create_brand.php";
$page_action = "Add Brand";
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'config/database.php'; 
include_once 'objects/brands.php'; 

// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$brand = new Brand($db);
 
// query products
$stmt = $brand->read($from_record_num, $records_per_page);
$num = $stmt->rowCount();

include_once'header.php';
include_once 'nav/side_nav.php';

  // Table
  echo '<table class="w3-table w3-striped w3-bordered w3-border 
  w3-hoverable w3-white w3-card-4 w3-table-all">'; 

  if ($num>0) {
  echo 
    "<tr>
      <th>UID</th>
      <th>Name</th>
      <th>Created On</th>
      <th>Created By</th>
      <th>Updated On</th>
      <th>Updated By</th>
      <th>Action</th>
    </tr>";

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

  echo 
    "<tr>

      </td>
      <td> {$Brand_UID} </td>
      <td> {$Brand_N} </td>
      <td> {$Created_On} </td>
      <td> {$Created_By} </td>
      <td> {$Updated_On} </td>
      <td> {$Updated_By} </td>
     
      <td>
        <a href='view_brand.php?id={$Brand_ID}' class='w3-button w3-blue left-margin w3-round'>
        <span class='glyphicon glyphicon-th-list'></span> 
        </a>

        <a href='update_brand.php?id={$Brand_ID}' class='w3-button w3-green left-margin w3-round'>
        <span class='glyphicon glyphicon-edit'></span> 
        </a>

       <a delete-id='{$Brand_ID}' class='w3-button w3-red left-margin delete-object w3-round'>
        <span class='glyphicon glyphicon-trash'></span> 
        </a>
      </td>
    </tr>";
  }
  
$page_url = "read_brands.php?";
 
// count all products in the database to calculate total pages
$total_rows = $brand->count_all();

echo "</table><br>"; // End of Table

// paging buttons here
include_once 'paging.php';

} else {
  echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>No Brands Found!!!</p>
      </div>";
}

include_once ('footer.php'); 
?>