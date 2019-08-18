<?php
class Tax {
 
    // database connection and table name
    private $conn;
    private $table_name = "Tax";
 
    // object properties
    public $Tax_ID;
    public $Tax_N;
    public $Tax_Percentage;
    public $Is_Deleted;
    public $Created_On;
    public $Created_By;
    public $Updated_On;
    public $Updated_By;

 
    public function __construct($db){
        $this->conn = $db;
    }

    function create(){
        try {
            //write query
            $query = "INSERT INTO " . $this->table_name . "
                SET
            
                    Tax_N=:Tax_N,
                    Tax_Percentage=:Tax_Percentage,
                    Is_Deleted=:Is_Deleted,
                    Created_On=:Created_On,
                    Created_By=:Created_By,
                    Updated_On=:Updated_On,
                    Updated_By=:Updated_By";

                    $stmt = $this->conn->prepare($query);

                    // posted values

               
                $this->Tax_N=htmlspecialchars(strip_tags($this->Tax_N));
                $this->Tax_Percentage=htmlspecialchars(strip_tags($this->Tax_Percentage));
                $this->Is_Deleted=htmlspecialchars(strip_tags($this->Is_Deleted));
                $this->Created_On=htmlspecialchars(strip_tags($this->Created_On));
                $this->Created_By=htmlspecialchars(strip_tags($this->Created_By));
                $this->Updated_On=htmlspecialchars(strip_tags($this->Updated_On));
                $this->Updated_By=htmlspecialchars(strip_tags($this->Updated_By));

                $this->timestamp = date('Y-m-d H:i:s');
                $this->Created_By = 'Administrator';
                $this->Updated_By = 'Administrator';

                    // bind values
                   
                    $stmt->bindParam(":Tax_N", $this->Tax_N);
                    $stmt->bindParam(":Tax_Percentage", $this->Tax_Percentage);
                    $stmt->bindParam(":Is_Deleted", $this->Is_Deleted);
                    $stmt->bindParam(":Created_On", $this->timestamp);
                    $stmt->bindParam(":Created_By", $this->Created_By);
                    $stmt->bindParam(":Updated_On", $this->timestamp);
                    $stmt->bindParam(":Updated_By", $this->Updated_By);

                    if ($stmt->execute()) {
                        return true;
                    } else {
                        return false;
                    }

        } catch(PDOException $e) {
            $existingkey = "Integrity constraint violation: 1062 Duplicate entry";
            if (strpos($e->getMessage(), $existingkey) !== FALSE) {
                // Take some action if there is a key constraint violation, i.e. duplicate name
            } else {
                throw $e;
            }
        }

    } 


    function read($from_record_num, $records_per_page){
 
        $query = "SELECT * FROM " . $this->table_name . "
                ORDER BY
                    Tax_N ASC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }

    function update(){
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    Tax_N=:Tax_N,
                    Tax_Percentage=:Tax_Percentage,
                    Updated_On=:Updated_On,
                    Updated_By=:Updated_By
                   
                WHERE
                    Tax_ID = :Tax_ID";
     
        $stmt = $this->conn->prepare($query);
     
        // posted values
        $this->Tax_N = htmlspecialchars(strip_tags($this->Tax_N));
        $this->Tax_ID = htmlspecialchars(strip_tags($this->Tax_ID));
        $this->Tax_Percentage=htmlspecialchars(strip_tags($this->Tax_Percentage));
        $this->Updated_On = htmlspecialchars(strip_tags($this->Updated_On));
        $this->Updated_By = htmlspecialchars(strip_tags($this->Updated_By));

        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
        $this->Updated_By = "Administrator";

        // bind values
        $stmt->bindParam(":Tax_ID", $this->Tax_ID);
        $stmt->bindParam(":Tax_N", $this->Tax_N);
        $stmt->bindParam(":Tax_Percentage", $this->Tax_Percentage);
        $stmt->bindParam(":Updated_On", $this->timestamp);
        $stmt->bindParam(":Updated_By", $this->Updated_By);

        // execute the query
        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
         
    }

    // delete the product
    function delete(){
     
        $query = "DELETE FROM " . $this->table_name . " WHERE Tax_ID = ?";
         
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
     
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

   // used for paging products
    public function count_all(){
     
        $query = "SELECT Tax_ID FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    public function select_one(){

        $query = "SELECT
                        Tax_ID,
                        Tax_Percentage,
                        Tax_N,
                        Is_Deleted,
                        Created_On,
                        Created_By,
                        Updated_On,
                        Updated_By
                 FROM
                    " . $this->table_name . "
                WHERE
                    Tax_ID = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->Tax_ID);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->Tax_ID = $row['Tax_ID'];
        $this->Tax_Percentage = $row['Tax_Percentage'];
        $this->Tax_N = $row['Tax_N'];
        $this->Is_Deleted = $row['Is_Deleted'];
        $this->Created_On = $row['Created_On'];
        $this->Created_By = $row['Created_By'];
        $this->Updated_On = $row['Updated_On'];
        $this->Updated_By = $row['Updated_By'];
       
    }


##################################
    public function read_all(){
 
        $query = "SELECT * FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    } 
    
}
?>