<?php
// check if value was posted
if($_POST){
 
    // include database and object file
    include_once 'config/database.php';
    include_once 'objects/brands.php';
    include_once 'objects/products.php';
    include_once 'objects/sales.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $brand = new Brand($db);
    //$product= new Product($db);
    //$sale= new Sale($db);

    //$p_stmt = $product->select_all();
    //$p_num = $p_stmt->rowCount();

    //$s_stmt = $sale->select_all();
    //$s_num = $s_stmt->rowCount();


    // set product id to be deleted
        $brand->id = $_POST['object_id'];

        // delete the product
        if($brand->delete()){
            echo "Object was deleted.";
            alert("Hello! I am an alert box!");
        } // if unable to delete the product
        else{
            echo 
            "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
            <h3>Alert!</h3>
            <p>Unable to delete objects</p>
            </div>";
        }

    /*if ($p_num == 0) {
        
    } else {
            echo 
            "<div class=\"w3-panel w3-pale-red w3-border w3-card-4\">
            <h3>Alert!</h3>
            <p>Unable to delete objects</p>
            </div>";
    }  */
    
}
?>