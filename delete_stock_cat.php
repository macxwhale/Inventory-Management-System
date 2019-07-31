<?php
// check if value was posted
if($_POST){
 
    // include database and object file
    include_once 'config/database.php';
    include_once 'objects/stock_categories.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $stock_cat = new Stock_Cat($db);
     
    // set product id to be deleted
    $stock_cat->id = $_POST['object_id'];
     
    // delete the product
    if($stock_cat->delete()){
        echo "Object was deleted.";
    }
     
    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    }
}
?>