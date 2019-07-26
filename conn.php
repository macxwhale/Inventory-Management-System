<?php 
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "php_stock";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}

class Customer{
 
    // database connection and table name
    private $conn;
    private $table_name = "a_customers";
 
    // object properties
    public $Customer_Id;
    public $Customer_Name;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT
                    Customer_Id, Customer_Name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    Customer_Name";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
 
}


$database = new Database();
$db = $database->getConnection();

$customer= new Customer($db);

// read the product categories from the database
$stmt = $category->read();
 
// put them in a select drop-down
echo "<select class='form-control' name='category_id'>";
    echo "<option>Select category...</option>";
 
    while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row_category);
        echo "<option value='{$id}'>{$name}</option>";
    }
 
echo "</select>";

?>