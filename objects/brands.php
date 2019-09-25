<?php
class Brand{
 
    // database connection and table name
    private $conn;
    private $table_name = "brands";
 
    // object properties
    public $Brand_ID;
    public $Brand_UID;
    public $Brand_N;
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
                    Brand_ID=:Brand_ID,
                    Brand_UID=:Brand_UID,
                    Brand_N=:Brand_N,
                    Is_Deleted=:Is_Deleted,
                    Created_On=:Created_On,
                    Created_By=:Created_By,
                    Updated_On=:Updated_On,
                    Updated_By=:Updated_By";

                    $stmt = $this->conn->prepare($query);

                    // posted values

                    $this->Brand_ID=htmlspecialchars(strip_tags($this->Brand_ID));
                    $this->Brand_UID=htmlspecialchars(strip_tags($this->Brand_UID));
                    $this->Brand_N=htmlspecialchars(strip_tags($this->Brand_N));
                    $this->Is_Deleted=htmlspecialchars(strip_tags($this->Is_Deleted));
                    $this->Created_On=htmlspecialchars(strip_tags($this->Created_On));
                    $this->Created_By=htmlspecialchars(strip_tags($this->Created_By));
                    $this->Updated_On=htmlspecialchars(strip_tags($this->Updated_On));
                    $this->Updated_By=htmlspecialchars(strip_tags($this->Updated_By));

                    $this->timestamp = date('Y-m-d H:i:s');
                    $this->Created_By = 'Administrator';
                    $this->Updated_By = 'Administrator';

                    // bind values
                    $stmt->bindParam(":Brand_ID", $this->Brand_ID);
                    $stmt->bindParam(":Brand_UID", $this->Brand_UID);
                    $stmt->bindParam(":Brand_N", $this->Brand_N);
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
                    Brand_N ASC
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
                    Brand_N=:Brand_N,
                    Updated_On=:Updated_On,
                    Updated_By=:Updated_By
                   
                WHERE
                    Brand_ID = :Brand_ID";
     
        $stmt = $this->conn->prepare($query);
     
        // posted values
        $this->Brand_N = htmlspecialchars(strip_tags($this->Brand_N));
        $this->Brand_ID = htmlspecialchars(strip_tags($this->Brand_ID));
        $this->Updated_On = htmlspecialchars(strip_tags($this->Updated_On));
        $this->Updated_By = htmlspecialchars(strip_tags($this->Updated_By));

        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
        $this->Updated_By = "Administrator";

        // bind values
        $stmt->bindParam(":Brand_ID", $this->Brand_ID);
        $stmt->bindParam(":Brand_N", $this->Brand_N);
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
     
        $query = "DELETE FROM " . $this->table_name . " WHERE Brand_ID = ?";
         
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
     
        $query = "SELECT Brand_ID FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }
       
    public function select_one(){

        $query = "SELECT
                        Brand_ID,
                        Brand_UID,
                        Brand_N,
                        Is_Deleted,
                        Created_On,
                        Created_By,
                        Updated_On,
                        Updated_By
                 FROM
                    " . $this->table_name . "
                WHERE
                    Brand_ID = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->Brand_ID);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
     
        $this->Brand_ID = $row['Brand_ID'];
        $this->Brand_UID = $row['Brand_UID'];
        $this->Brand_N = $row['Brand_N'];
        $this->Is_Deleted = $row['Is_Deleted'];
        $this->Created_On = $row['Created_On'];
        $this->Created_By = $row['Created_By'];
        $this->Updated_On = $row['Updated_On'];
        $this->Updated_By = $row['Updated_By'];
       
    }


#################################################
public function read_all(){
 
        $query = "SELECT * FROM " . $this->table_name . "
                ORDER BY
                    Brand_N";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }    
 
}
?>