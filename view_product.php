<?php 
// Set header title
$header_title = "Product";
// Set page title
$page_title = "Product Details";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing id.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/products.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$product = new Product($db);
 
// set ID property of product to be read
$product->Product_ID = $id;
 
// read the details of product to be read
$product->select_one();
include_once 'header.php'; 
include_once 'nav/side_nav.php'; 

echo 
"<table class=\"w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 w3-table-all\">

  <tr>
    <th class=\"w3-right-align\">Product ID</th>
    <td>{$product->Product_ID}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Product UID</th>
    <td>{$product->Product_UID}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Product Name</th>
    <td>{$product->Product_N}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Supplier Name</th>
    <td>{$product->Supplier_Name}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Brand Name</th>
    <td>{$product->Brand_N}</td>
  </tr>


  <tr>
    <th class=\"w3-right-align\"> Quantity</th>
    <td>{$product->Quantity}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Buying Price</th>
    <td>{$product->Buying_Price}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Selling Price</th>
    <td>{$product->Selling_Price}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\"> Profit</th>
    <td>{$product->Profit}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">In Stock</th>
    <td>{$product->In_Stock}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Created On </th>
    <td>{$product->Created_On}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Created By</th>
    <td>{$product->Created_By}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Updated On</th>
    <td>{$product->Updated_On}</td>
  </tr>

  <tr>
    <th class=\"w3-right-align\">Updated By</th>
    <td>{$product->Updated_By}</td>
  </tr>

</table><br>
<a href=\"/pos/read_products.php\"><button type=\"button\" class=\"btn btn-danger\">Back</button></a><hr>";
   

?>

<?php include ('footer.php'); ?>