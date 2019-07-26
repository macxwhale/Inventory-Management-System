<?php include ('header.php'); ?>
<?php include ('nav/side_nav.php'); ?>


<?
class customers{
function verifyFields($params)
{
	$error = '';

	if (!is_string($params['produc']))
	{
		$error .= 'Field >produc< is not a string';
	}
	if ((strtotime($params['date']) == -1) || (strtotime($params['date']) == false))
	{
		$error .= 'Field >date< is not a valid date';
	}
	return $error;
}

function add($params)
{
	global $db;

	if (($errors = $this->verifyFields($params)) != '')
	{
		return $errors;
	}

	$data = array(
		'id' => $params['id'],
		'produc' => $params['produc'],
		'date' => $params['date']
	);

	//Returns either the new ID of the row inserted or FALSE on failure 
	return $db->query_insert('customers', $data);
}

function edit($id, $params)
{
	global $db;

	if (($errors = $this->verifyFields($params)) != '')
	{
		return $errors;
	}

	$data = array(
		'id' => $params['id'],
		'produc' => $params['produc'],
		'date' => $params['date']
	);

	return $db->query_update('customers', $data, '  = ' . $id);
}

function delete($id)
{
	global $db;

	return $db->query(sprintf('DELETE FROM `customers` WHERE  = %d', $id));
}

function getAll($startIndex = null, $numRows = null, $orderBy = null, $orderDirection = 'asc')
{
	global $db;

	if (($startIndex != null) && (!is_numeric($startIndex) || ($startIndex < 0)))
	{
		return false;
	}

	if (($numRows != null) && (!is_numeric($numRows) || ($numRows < 0)))
	{
		return false;
	}

	$order = '';
	$limit = '';
	$fieldsArray = array('id', 'produc', 'date');

	if (($orderBy != null) && !in_array($orderBy, $fieldsArray))
	{
		return false;
	}

	if ((strtolower($orderDirection) != 'asc') && (strtolower($orderDirection) != 'desc'))
	{
		return false;
	}

	if (($startIndex != null) && ($numRows != null))
	{
		$limit = sprintf(' LIMIT %d, %d', $startIndex, $numRows);
	}
	else if (($startIndex != null) && ($numRows == null))
	{
		$limit = sprintf(' LIMIT %d', $startIndex);
	}

	if (($orderBy != null) && ($orderDirection != null))
	{
		$order = sprintf(' ORDER BY %s %s', $orderBy, $orderDirection);
	}
	else if (($orderBy != null) && ($orderDirection == null))
	{
		$order = sprintf(' ORDER BY %s ASC ', $orderBy);
	}

	$sql = sprintf("SELECT `id`, `produc`, `date` FROM `customers` %s %s", $order, $limit);
	return $db->fetch_all_array($sql);
}
}
?>


<?php include ('footer.php'); ?>