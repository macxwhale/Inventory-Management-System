
<?php
	//include connection file 
	include_once("connection.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		
		0 => 'Sales_ID', 
		1 => 'Sales_Number', 
		2 => 'Sales_Date', 
		3 => 'Customer_ID', 
		4 => 'Product_ID', 
		5 => 'Tax_ID', 
		6 => 'Quantity', 
		7 => 'Total_Amount', 
		8 => 'Total_Payment', 
		9 => 'Total_Balance', 
		10 => 'Profit', 
		11 => 'Discount_Percentage', 
		12 => 'Payment_Type',
		13 => 'Discount_Amount', 
		14 => 'Tax_Percentage', 
		15 => 'Tax_Amount', 
		16 => 'Tax_Description', 
		17 => 'Final_Total_Amount', 
		18 => 'Dated_Added', 
		19 => 'Added_By', 
		20 => 'Date_Updated', 
		21 => 'Updated_By',

	);

	$where = $sqlTot = $sqlRec = "";

	// getting total number records without any search
	$sql = "SELECT * FROM `Sales` ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;


 	$sqlRec .=  " ORDER BY Sales_ID";

	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_row($queryRecords) ) { 
		$data[] = $row;
	}	

	$json_data = array(
			"draw"            => 1,   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	