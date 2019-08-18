<?php 
// Set header title
$header_title = "Products";
// Set page title
$page_title = "Add Products";
// include database and object files
include_once 'config/database.php';
include_once 'objects/brands.php';
include_once 'objects/customers.php';
include_once 'objects/purchases.php';
include_once 'objects/sales.php';
include_once 'objects/products.php';
include_once 'objects/suppliers.php';
include_once 'objects/tax.php';


// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$product = new Product($db);
$supplier = new Supplier($db);
$brand = new Brand($db);

$s_stmt = $supplier->read_all();
$s_num = $s_stmt->rowCount();

$b_stmt = $brand->read_all();
$b_num = $b_stmt->rowCount();


include_once'header.php';
include_once 'nav/side_nav.php';



include_once 'forms/generate_reports.php';



include ('footer.php'); ?>