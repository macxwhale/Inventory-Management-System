<?php
class Purchase{
 
    // database connection and table name
    private $conn;
    private $table_name = "purchases";
 
    // object properties

    public $Purchase_ID;
    public $Purchase_Number;
    public $Purchase_Date;
    public $Supplier_ID;
    public $Notes;
    public $Total_Amount;
    public $Total_Payment;
    public $Total_Balance;
    public $Date_Added;
    public $Added_By;
    public $Date_Updated;
    public $Updated_By;

 
    public function __construct($db){
        $this->conn = $db;
    }


    function readAll($from_record_num, $records_per_page){
 
    $query = "SELECT
                Purchase_ID, Purchase_Number, Purchase_Date, Supplier_ID, Notes, Total_Amount, Total_Payment, Total_Balance, Date_Added, Added_By, Date_Updated, Updated_By
            FROM
                " . $this->table_name . "
            ORDER BY
                Purchase_ID ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
    }


    // used for paging products
    public function countAll(){
     
        $query = "SELECT Purchase_ID FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    function readOne(){
 
        $query = "SELECT
                        Purchase_ID,
                        Purchase_Number,
                        Purchase_Date,
                        Supplier_ID,
                        Notes,
                        Total_Amount,
                        Total_Payment,
                        Total_Balance,
                        Date_Added,
                        Added_By,
                        Date_Updated,
                        Updated_By
                 FROM
                    " . $this->table_name . "
                WHERE
                    Purchase_ID = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->Purchase_ID);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->Purchase_ID = $row['Purchase_ID'];
        $this->Purchase_Number = $row['Purchase_Number'];
        $this->Purchase_Date = $row['Purchase_Date'];
        $this->Supplier_ID = $row['Supplier_ID'];
        $this->Notes = $row['Notes'];
        $this->Total_Amount = $row['Total_Amount'];
        $this->Total_Payment = $row['Total_Payment'];
        $this->Total_Balance = $row['Total_Balance'];
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
                Purchase_Date=:Purchase_Date,
                Supplier_ID=:Supplier_ID,
                Notes=:Notes,
                Total_Amount=:Total_Amount,
                Total_Payment=:Total_Payment,
                Total_Balance=:Total_Balance
        
            WHERE
                Purchase_ID = :Purchase_ID";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
        $this->Purchase_ID = htmlspecialchars(strip_tags($this->Purchase_ID));
        //$this->Customer_Name = htmlspecialchars(strip_tags($this->Customer_Name));
        $this->Purchase_Date = htmlspecialchars(strip_tags($this->Purchase_Date));
        $this->Supplier_ID = htmlspecialchars(strip_tags($this->Supplier_ID));
        $this->Notes = htmlspecialchars(strip_tags($this->Notes));
        $this->Total_Amount = htmlspecialchars(strip_tags($this->Total_Amount));
        $this->Total_Payment = htmlspecialchars(strip_tags($this->Total_Payment));
        $this->Total_Balance = htmlspecialchars(strip_tags($this->Total_Balance));

        //$this->Balance = htmlspecialchars(strip_tags($this->Balance));
 
        // to get time-stamp for 'created' field
        //$this->timestamp = date('Y-m-d H:i:s');
 
        // bind values
        $stmt->bindParam(":Purchase_ID", $this->Purchase_ID);
        //$stmt->bindParam(":Customer_Name", $this->Customer_Name);
        $stmt->bindParam(":Purchase_Date", $this->Purchase_Date);
        $stmt->bindParam(":Supplier_ID", $this->Supplier_ID);
        $stmt->bindParam(":Notes", $this->Notes);
        $stmt->bindParam(":Total_Amount", $this->Total_Amount);
        $stmt->bindParam(":Total_Payment", $this->Total_Payment);
        $stmt->bindParam(":Total_Balance", $this->Total_Balance);
     
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
 
    $query = "DELETE FROM " . $this->table_name . " WHERE Purchase_ID = ?";
     
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

                
                    Purchase_Number=:Purchase_Number,
                    Purchase_Date=:Purchase_Date,
                    Supplier_ID=:Supplier_ID,
                    Notes=:Notes,
                    Total_Amount=:Total_Amount,
                    Total_Payment=:Total_Payment,
                    Total_Balance=:Total_Balance,
                    Date_Added=:Date_Added,
                    Added_By=:Added_By,
                    Date_Updated=:Date_Updated,
                    Updated_By=:Updated_By";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        //$this->Customer_Id = htmlspecialchars(strip_tags($this->Customer_Id));
        $this->Purchase_Number = htmlspecialchars(strip_tags($this->Purchase_Number));
        $this->Purchase_Date = htmlspecialchars(strip_tags($this->Purchase_Date));
        $this->Supplier_ID = htmlspecialchars(strip_tags($this->Supplier_ID));
        $this->Notes = htmlspecialchars(strip_tags($this->Notes));
        $this->Total_Amount = htmlspecialchars(strip_tags($this->Total_Amount));
        $this->Total_Payment = htmlspecialchars(strip_tags($this->Total_Payment));
        $this->Total_Balance = htmlspecialchars(strip_tags($this->Total_Balance));
        $this->Date_Added = htmlspecialchars(strip_tags($this->Date_Added));
        $this->Added_By = htmlspecialchars(strip_tags($this->Added_By));
        $this->Date_Updated = htmlspecialchars(strip_tags($this->Date_Updated));
        $this->Updated_By = htmlspecialchars(strip_tags($this->Updated_By));
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
        $this->Added_By = 'Administrator';
 
        // bind values
        //$stmt->bindParam(":Customer_Id", $this->Customer_Id);
        $stmt->bindParam(":Purchase_Number", $this->Purchase_Number);
        $stmt->bindParam(":Purchase_Date", $this->Purchase_Date);
        $stmt->bindParam(":Supplier_ID", $this->Supplier_ID);
        $stmt->bindParam(":Notes", $this->Notes);
        $stmt->bindParam(":Total_Amount", $this->Total_Amount);
        $stmt->bindParam(":Total_Payment", $this->Total_Payment);
        $stmt->bindParam(":Total_Balance", $this->Total_Balance);
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






}
?>