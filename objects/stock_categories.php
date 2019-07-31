<?php
class Stock_Cat{
 
    // database connection and table name
    private $conn;
    private $table_name = "stock_categories";
 
    // object properties

    public $Category_ID;
    public $Category_Name;

 
    public function __construct($db){
        $this->conn = $db;
    }


    function readAll($from_record_num, $records_per_page){
 
    $query = "SELECT
                Category_ID, Category_Name
            FROM
                " . $this->table_name . "
            ORDER BY
                Category_Name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
    }


    // used for paging products
    public function countAll(){
     
        $query = "SELECT Category_ID FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    function readOne(){
 
        $query = "SELECT
                        Category_ID,
                        Category_Name
                 FROM
                    " . $this->table_name . "
                WHERE
                    Category_ID = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->Category_ID);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->Category_ID = $row['Category_ID'];
        $this->Category_Name = $row['Category_Name'];
    

    }


    // create product
    function creat(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET

                    Stock_Number=:Stock_Number,
                    Stock_Name=:Stock_Name,
                    Address=:Address,
                    City=:City,
                    Country=:Country,
                    Contact_Person=:Contact_Person,
                    Phone_Number=:Phone_Number,
                    Email=:Email,
                    Mobile_Number=:Mobile_Number,
                    Notes=:Notes,
                    Balance=:Balance,
                    Date_Added=:Date_Added,
                    Added_By=:Added_By,
                    Date_Updated=:Date_Updated,
                    Updated_By=:Updated_By";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        //$this->Stock_Id = htmlspecialchars(strip_tags($this->Stock_Id));
        $this->Stock_Number = htmlspecialchars(strip_tags($this->Stock_Number));
        $this->Stock_Name = htmlspecialchars(strip_tags($this->Stock_Name));
        $this->Address = htmlspecialchars(strip_tags($this->Address));
        $this->City = htmlspecialchars(strip_tags($this->City));
        $this->Country = htmlspecialchars(strip_tags($this->Country));
        $this->Contact_Person = htmlspecialchars(strip_tags($this->Contact_Person));
        $this->Phone_Number = htmlspecialchars(strip_tags($this->Phone_Number));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Mobile_Number = htmlspecialchars(strip_tags($this->Mobile_Number));
        $this->Notes = htmlspecialchars(strip_tags($this->Notes));
        $this->Balance = htmlspecialchars(strip_tags($this->Balance));
        $this->Date_Added = htmlspecialchars(strip_tags($this->Date_Added));
        $this->Added_By = htmlspecialchars(strip_tags($this->Added_By));
        $this->Date_Updated = htmlspecialchars(strip_tags($this->Date_Updated));
        $this->Updated_By = htmlspecialchars(strip_tags($this->Updated_By));
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
        $this->Added_By = 'Administrator';
 
        // bind values
        //$stmt->bindParam(":Stock_Id", $this->Stock_Id);
        $stmt->bindParam(":Stock_Number", $this->Stock_Number);
        $stmt->bindParam(":Stock_Name", $this->Stock_Name);
        $stmt->bindParam(":Address", $this->Address);
        $stmt->bindParam(":City", $this->City);
        $stmt->bindParam(":Country", $this->Country);
        $stmt->bindParam(":Contact_Person", $this->Contact_Person);
        $stmt->bindParam(":Phone_Number", $this->Phone_Number);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":Mobile_Number", $this->Mobile_Number);
        $stmt->bindParam(":Notes", $this->Notes);
        $stmt->bindParam(":Balance", $this->Balance);
        $stmt->bindParam(":Date_Added", $this->timestamp);
        $stmt->bindParam(":Added_By", $this->Added_By);
        $stmt->bindParam(":Date_Updated", $this->timestamp);
        $stmt->bindParam(":Updated_By", $this->timestamp);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

    function update(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
                Category_Name=:Category_Name
               
            WHERE
                Category_ID = :Category_ID";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
        $this->Category_Name = htmlspecialchars(strip_tags($this->Category_Name));
        $this->Category_ID = htmlspecialchars(strip_tags($this->Category_ID));
       
        //$this->Balance = htmlspecialchars(strip_tags($this->Balance));
 
        // to get time-stamp for 'created' field
        //$this->timestamp = date('Y-m-d H:i:s');
 
        // bind values
        $stmt->bindParam(":Category_ID", $this->Category_ID);
        $stmt->bindParam(":Category_Name", $this->Category_Name);
       
        //$stmt->bindParam(":Date_Updated", $this->timestamp);
        //$stmt->bindParam(":Updated_By", $this->timestamp);
 
        // execute the query
        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
 
    

    echo $query;
     
    }


// delete the product
function delete(){
 
    $query = "DELETE FROM " . $this->table_name . " WHERE Category_ID = ?";
     
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
 
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}


// create product
    function create(){

     


        try {


        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    Category_Name=:Category_Name";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        //$this->Category_ID = htmlspecialchars(strip_tags($this->Category_ID));
        $this->Category_Name = htmlspecialchars(strip_tags($this->Category_Name));
    
 
    
        // bind values
        //$stmt->bindParam(":Stock_Id", $this->Stock_Id);
        //$stmt->bindParam(":Category_ID", $this->Category_ID);
         $stmt->bindParam(":Category_Name", $this->Category_Name);

 
        if($stmt->execute()){
            return true;
        }else{
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
 
    function readName(){
 
    $query = "SELECT
                Category_ID, Category_Name
            FROM
                " . $this->table_name . "
            ORDER BY
                Category_Name ASC";
           
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
    }







}
?>