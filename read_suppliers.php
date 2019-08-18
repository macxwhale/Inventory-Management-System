<?php 
// page given in URL parameter, default page is one. This is for the pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set header title
$header_title = "Suppliers";
// Set page title
$page_title = "Suppliers";

$page_link = "create_supplier.php";
$page_action = "Add Supplier";
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'config/database.php'; 
include_once 'objects/suppliers.php'; 

// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$supplier = new Supplier($db);
 
// query products
$stmt = $supplier->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

include_once'header.php';
include_once 'nav/side_nav.php';

  // Table
  echo '<table class="w3-table w3-striped w3-bordered w3-border 
  w3-hoverable w3-white w3-card-4 w3-table-all">'; 

  if ($num>0) {
  echo 
    "<tr>
      <th>Supplier Number</th>
      <th>Supplier Name</th>
      <th>Contact Person</th>
      <th>Phone Number</th>
      <th>Mobile Number</th>
      <th>Action</th>
    </tr>";

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

  echo 
    "<tr>
      <td> {$Supplier_Number} </td>
      <td> {$Supplier_Name} </td>
      <td> {$Contact_Person} </td>
      <td> {$Phone_Number} </td>
      <td> {$Mobile_Number}</td>
      <td>
        <a href='view_supplier.php?id={$Supplier_Id}' class='w3-button w3-blue left-margin w3-round'>
        <span class='glyphicon glyphicon-list'></span> 
        </a>

        <a href='update_supplier.php?id={$Supplier_Id}' class='w3-button w3-green left-margin w3-round'>
        <span class='glyphicon glyphicon-edit'></span> 
        </a>

        <a delete-id='{$Supplier_Id}' class='w3-button w3-red left-margin delete-object w3-round'>
        <span class='glyphicon glyphicon-remove'></span> 
        </a>
      </td>
    </tr>";
  }
  
$page_url = "read_suppliers.php?";
 
// count all products in the database to calculate total pages
$total_rows = $supplier->countAll();

echo "</table><br>"; // End of Table

// paging buttons here
include_once 'paging.php';


} else {
  echo 
      "<div class=\"w3-panel w3-pale-green w3-border w3-card-4\">
      <h3>Alert!</h3>
      <p>Please Add Suppliers!!!</p>
      </div>";
}

include_once ('footer.php'); 
?>