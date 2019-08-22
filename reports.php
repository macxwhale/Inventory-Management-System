<?php 
ob_start();
// Set header title
$header_title = "Reports";
// Set page title
$page_title = "Generate Reports";
include_once ('header.php');
include_once ('nav/side_nav.php');
include_once ('forms/generate_reports.php');
print_r($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$_POST["Category"] === "";
	switch ($_POST["Category"]) {
	case 'Brands':
		header("Location: reports/brands.php");
		die();
		break;
	case 'Customers':
		header("Location: reports/customers.php");
		die();
		break;
	case 'Products':
		header("Location: reports/products.php");
		die();
		break;		
	case 'Sales':
		header("Location: reports/sales.php");
		die();
		break;
	case 'Suppliers':
		header("Location: reports/suppliers.php");
		die();
		break;	
	default:
		echo "string";
		break;
}
}


include_once ('footer.php'); 
?>