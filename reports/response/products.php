
<?php
	//include connection file 
	include_once("connection.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		
		0 => 'Product_ID', 
		1 => 'Product_UID', 
		2 => 'Product_N', 
		3 => 'Supplier_ID', 
		4 => 'Brand_ID', 
		5 => 'Quantity', 
		6 => 'Buying_Price', 
		7 => 'Selling_Price', 
		8 => 'Total_Payment', 
		9 => 'Balance', 
		10 => 'Profit', 
		11 => 'In_Stock', 
		12 => 'Is_Returned', 
		13 => 'Expiry_Date', 
		14 => 'Created_On', 
		15 => 'Created_By',
		16 => 'Updated_On',
		17 => 'Updated_By',

	);

	$where = $sqlTot = $sqlRec = "";

	// getting total number records without any search
	$sql = "SELECT * FROM `Products` ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;


 	$sqlRec .=  " ORDER BY Product_ID";

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
	