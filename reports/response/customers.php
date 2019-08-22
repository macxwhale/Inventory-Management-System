
<?php
	//include connection file 
	include_once("connection.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		
		0 => 'Customer_ID', 
		1 => 'Customer_Number', 
		2 => 'Customer_Name', 
		3 => 'Address', 
		4 => 'City', 
		5 => 'Country', 
		6 => 'Contact_Person', 
		7 => 'Customer_Type', 
		8 => 'Phone_Number', 
		9 => 'Email', 
		10 => 'Mobile_Number', 
		11 => 'Balance', 
		12 => 'Date_Added', 
		13 => 'Added_By', 
		14 => 'Date_Updated', 
		15 => 'Updated_By',

	);

	$where = $sqlTot = $sqlRec = "";

	// getting total number records without any search
	$sql = "SELECT * FROM `Customers` ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;


 	$sqlRec .=  " ORDER BY Customer_ID";

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
	