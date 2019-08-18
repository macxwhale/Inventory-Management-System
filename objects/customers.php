<?php
class Customer{
 
    // database connection and table name
    private $conn;
    private $table_name = "customers";
 
    // object properties

    public $Customer_Id;
    public $Customer_Number;
    public $Customer_Name;
    public $Address;
    public $City;
    public $Country;
    public $Contact_Person;
    public $Customer_Type;
    public $Phone_Number;
    public $Email;
    public $Mobile_Number;
    public $Notes;
    public $Balance;
    public $Date_Added;
    public $Added_By;
    public $Date_Updated;
    public $Updated_By;

 
    public function __construct($db){
        $this->conn = $db;
    }


    function readAll($from_record_num, $records_per_page){
 
    $query = "SELECT
                Customer_Id, 
                Customer_Number, 
                Customer_Name, 
                Contact_Person, 
                Phone_Number, 
                Mobile_Number, 
                Balance, 
                Customer_Type
            FROM
                " . $this->table_name . "
            ORDER BY
                Customer_Name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
    }


    // used for paging products
    public function countAll(){
     
        $query = "SELECT Customer_Id FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    function readOne(){
 
        $query = "SELECT
                        Customer_Id,
                        Customer_Number,
                        Customer_Name,
                        Address,
                        City,
                        Country,
                        Contact_Person,
                        Customer_Type,
                        Phone_Number,
                        Email,
                        Mobile_Number,
                        Balance,
                        Date_Added,
                        Added_By,
                        Date_Updated,
                        Updated_By
                 FROM
                    " . $this->table_name . "
                WHERE
                    Customer_Id = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->Customer_Id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->Customer_Id = $row['Customer_Id'];
        $this->Customer_Number = $row['Customer_Number'];
        $this->Customer_Name = $row['Customer_Name'];
        $this->Address = $row['Address'];
        $this->City = $row['City'];
        $this->Country = $row['Country'];
        $this->Contact_Person = $row['Contact_Person'];
        $this->Customer_Type = $row['Customer_Type'];
        $this->Phone_Number = $row['Phone_Number'];
        $this->Email = $row['Email'];
        $this->Mobile_Number = $row['Mobile_Number'];
        $this->Balance = $row['Balance'];
        $this->Date_Added = $row['Date_Added'];
        $this->Added_By = $row['Added_By'];
        $this->Date_Updated = $row['Date_Updated'];
        $this->Updated_By = $row['Updated_By'];
       

    }


    // create product
    function creat(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET

                    Customer_Number=:Customer_Number,
                    Customer_Name=:Customer_Name,
                    Address=:Address,
                    City=:City,
                    Country=:Country,
                    Contact_Person=:Contact_Person,
                    Contact_Type=:Contact_Type,
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
        //$this->Customer_Id = htmlspecialchars(strip_tags($this->Customer_Id));
        $this->Customer_Number = htmlspecialchars(strip_tags($this->Customer_Number));
        $this->Customer_Name = htmlspecialchars(strip_tags($this->Customer_Name));
        $this->Address = htmlspecialchars(strip_tags($this->Address));
        $this->City = htmlspecialchars(strip_tags($this->City));
        $this->Country = htmlspecialchars(strip_tags($this->Country));
        $this->Contact_Person = htmlspecialchars(strip_tags($this->Contact_Person));
        $this->Customer_Type = htmlspecialchars(strip_tags($this->Customer_Type));
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
        //$stmt->bindParam(":Customer_Id", $this->Customer_Id);
        $stmt->bindParam(":Customer_Number", $this->Customer_Number);
        $stmt->bindParam(":Customer_Name", $this->Customer_Name);
        $stmt->bindParam(":Address", $this->Address);
        $stmt->bindParam(":City", $this->City);
        $stmt->bindParam(":Country", $this->Country);
        $stmt->bindParam(":Contact_Person", $this->Contact_Person);
        $stmt->bindParam(":Customer_Type", $this->Customer_Type);
        $stmt->bindParam(":Phone_Number", $this->Phone_Number);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":Mobile_Number", $this->Mobile_Number);
        $stmt->bindParam(":Notes", $this->Notes);
        $stmt->bindParam(":Balance", $this->Balance);
        $stmt->bindParam(":Date_Added", $this->timestamp);
        $stmt->bindParam(":Added_By", $this->Added_By);
        $stmt->bindParam(":Date_Updated", $this->timestamp);
        $stmt->bindParam(":Updated_By", $this->Updated_By);
 
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
                Customer_Name=:Customer_Name,
                Address=:Address,
                City=:City,
                Country=:Country,
                Contact_Person=:Contact_Person,
                Customer_Type=:Customer_Type,
                Phone_Number=:Phone_Number,
                Email=:Email,
                Mobile_Number=:Mobile_Number
            WHERE
                Customer_Id = :Customer_Id";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
        $this->Customer_Id = htmlspecialchars(strip_tags($this->Customer_Id));
        $this->Customer_Name = htmlspecialchars(strip_tags($this->Customer_Name));
        $this->Address = htmlspecialchars(strip_tags($this->Address));
        $this->City = htmlspecialchars(strip_tags($this->City));
        $this->Country = htmlspecialchars(strip_tags($this->Country));
        $this->Contact_Person = htmlspecialchars(strip_tags($this->Contact_Person));
        $this->Customer_Type = htmlspecialchars(strip_tags($this->Customer_Type));
        $this->Phone_Number = htmlspecialchars(strip_tags($this->Phone_Number));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Mobile_Number = htmlspecialchars(strip_tags($this->Mobile_Number));
        //$this->Balance = htmlspecialchars(strip_tags($this->Balance));
 
        // to get time-stamp for 'created' field
        //$this->timestamp = date('Y-m-d H:i:s');
 
        // bind values
        $stmt->bindParam(":Customer_Id", $this->Customer_Id);
        $stmt->bindParam(":Customer_Name", $this->Customer_Name);
        $stmt->bindParam(":Address", $this->Address);
        $stmt->bindParam(":City", $this->City);
        $stmt->bindParam(":Country", $this->Country);
        $stmt->bindParam(":Contact_Person", $this->Contact_Person);
        $stmt->bindParam(":Customer_Type", $this->Customer_Type);
        $stmt->bindParam(":Phone_Number", $this->Phone_Number);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":Mobile_Number", $this->Mobile_Number);
        //$stmt->bindParam(":Balance", $this->Balance);
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
 
    $query = "DELETE FROM " . $this->table_name . " WHERE Customer_Id = ?";
     
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

                    Customer_Number=:Customer_Number,
                    Customer_Name=:Customer_Name,
                    Address=:Address,
                    City=:City,
                    Country=:Country,
                    Contact_Person=:Contact_Person,
                    Customer_Type=:Customer_Type,
                    Phone_Number=:Phone_Number,
                    Email=:Email,
                    Mobile_Number=:Mobile_Number,
                    Balance=:Balance,
                    Date_Added=:Date_Added,
                    Added_By=:Added_By,
                    Date_Updated=:Date_Updated,
                    Updated_By=:Updated_By";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        //$this->Customer_Id = htmlspecialchars(strip_tags($this->Customer_Id));
        $this->Customer_Number = htmlspecialchars(strip_tags($this->Customer_Number));
        $this->Customer_Name = htmlspecialchars(strip_tags($this->Customer_Name));
        $this->Address = htmlspecialchars(strip_tags($this->Address));
        $this->City = htmlspecialchars(strip_tags($this->City));
        $this->Country = htmlspecialchars(strip_tags($this->Country));
        $this->Contact_Person = htmlspecialchars(strip_tags($this->Contact_Person));
        $this->Customer_Type = htmlspecialchars(strip_tags($this->Customer_Type));
        $this->Phone_Number = htmlspecialchars(strip_tags($this->Phone_Number));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Mobile_Number = htmlspecialchars(strip_tags($this->Mobile_Number));
        $this->Balance = htmlspecialchars(strip_tags($this->Balance));
        $this->Date_Added = htmlspecialchars(strip_tags($this->Date_Added));
        $this->Added_By = htmlspecialchars(strip_tags($this->Added_By));
        $this->Date_Updated = htmlspecialchars(strip_tags($this->Date_Updated));
        $this->Updated_By = htmlspecialchars(strip_tags($this->Updated_By));
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
        $this->Added_By = 'Administrator';
 
        // bind values
        //$stmt->bindParam(":Customer_Id", $this->Customer_Id);
        $stmt->bindParam(":Customer_Number", $this->Customer_Number);
        $stmt->bindParam(":Customer_Name", $this->Customer_Name);
        $stmt->bindParam(":Address", $this->Address);
        $stmt->bindParam(":City", $this->City);
        $stmt->bindParam(":Country", $this->Country);
        $stmt->bindParam(":Contact_Person", $this->Contact_Person);
        $stmt->bindParam(":Customer_Type", $this->Customer_Type);
        $stmt->bindParam(":Phone_Number", $this->Phone_Number);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":Mobile_Number", $this->Mobile_Number);
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
                Customer_Name, Customer_ID, Customer_Number
            FROM
                " . $this->table_name . "
            ORDER BY
                Customer_Name ASC";
           
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
    }
########################################
public function read_all(){
 
        $query = "SELECT * FROM " . $this->table_name . "
                ORDER BY
                    Customer_Name";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }    
 






}
?>