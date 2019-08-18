<?php
class Sale{
 
    // database connection and table name
    private $conn;
    private $table_name = "sales";
 
    // object properties
 
    public $Sales_ID;
    public $Sales_Number;
    public $Sales_Date;
    public $Customer_ID;
    public $Product_ID;
    public $Tax_ID;
    public $Profit;
    public $Quantity;
    public $Total_Amount;
    public $Total_Payment;
    public $Total_Balance;
    public $Discount_Type;
    public $Discount_Percentage;
    public $Discount_Amount;
    public $Tax_Percentage;
    public $Tax_Amount;
    public $Tax_Description;
    public $Final_Total_Amount;
    public $Date_Added;
    public $Added_By;
    public $Date_Updated;
    public $Updated_By;

 
    public function __construct($db){
        $this->conn = $db;
    }


    function readAll($from_record_num, $records_per_page){
 
    $query = "SELECT
                Sales.Sales_Number, 
                Sales.Sales_ID, 
                Sales.Sales_Date, 
                Sales.Payment_Type,
                Customers.Customer_Name, 
                Products.Product_N,
                Sales.Total_Amount,
                Sales.Final_Total_Amount, 
                Sales.Total_Amount, 
                Sales.Total_Payment
            FROM
                " . $this->table_name . "
                INNER JOIN 
                    Customers  
                ON 
                Sales.Customer_ID = Customers.Customer_ID
                INNER JOIN 
                    Products  
                ON 
                Sales.Product_ID = Products.Product_ID
            ORDER BY
                Sales_Date ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
    }


    // used for paging products
    public function countAll(){
     
        $query = "SELECT Sales_ID FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    function readOne(){
 
        $query = "SELECT
                        Sales_ID,
                        Sales_Number,
                        Sales_Date,
                        Customer_ID,
                        Product_ID,
                        Tax_ID,
                        Quantity,
                        Total_Amount,
                        Total_Payment,
                        Total_Balance,
                       
                        Discount_Percentage,
                        Discount_Amount,
                        Tax_Percentage,
                        Tax_Amount,
                        Tax_Description,
                        Final_Total_Amount,
                        Date_Added,
                        Added_By,
                        Date_Updated,
                        Updated_By
                 FROM
                    " . $this->table_name . "
                WHERE
                    Sales_ID = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->Sales_ID);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->Sales_ID = $row['Sales_ID'];
        $this->Sales_Number = $row['Sales_Number'];
        $this->Sales_Date = $row['Sales_Date'];
        $this->Customer_ID = $row['Customer_ID'];
        $this->Product_ID = $row['Product_ID'];
        $this->Tax_ID = $row['Tax_ID'];
        $this->Quantity = $row['Quantity'];
        $this->Total_Amount = $row['Total_Amount'];
        $this->Total_Payment = $row['Total_Payment'];
        $this->Total_Balance = $row['Total_Balance'];
    
        $this->Discount_Percentage = $row['Discount_Percentage'];
        $this->Discount_Amount = $row['Discount_Amount'];
        $this->Tax_Percentage = $row['Tax_Percentage'];
        $this->Tax_Amount = $row['Tax_Amount'];
        $this->Tax_Description = $row['Tax_Description'];
        $this->Final_Total_Amount = $row['Final_Total_Amount'];
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
                Customer_ID=:Customer_ID,
                Product_ID=:Product_ID,
                Tax_ID=:Tax_ID,
                Quantity=:Quantity,
                Total_Payment=:Total_Payment,
                Updated_By=:Updated_By,
                Date_Updated=:Date_Updated
            WHERE
                Sales_ID = :Sales_ID";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
        $this->Sales_ID = htmlspecialchars(strip_tags($this->Sales_ID));
        $this->Customer_ID = htmlspecialchars(strip_tags($this->Customer_ID));
        $this->Product_ID = htmlspecialchars(strip_tags($this->Product_ID));
        $this->Tax_ID = htmlspecialchars(strip_tags($this->Tax_ID));
        $this->Quantity = htmlspecialchars(strip_tags($this->Quantity));
        $this->Total_Payment = htmlspecialchars(strip_tags($this->Total_Payment));
        $this->Date_Updated = htmlspecialchars(strip_tags($this->Date_Updated));
        $this->Updated_By = htmlspecialchars(strip_tags($this->Updated_By));
       
        
        
        //$this->Discount_Amount = htmlspecialchars(strip_tags($this->Discount_Amount));
        //$this->Tax_Percentage = htmlspecialchars(strip_tags($this->Tax_Percentage));
        //$this->Tax_Amount = htmlspecialchars(strip_tags($this->Tax_Amount));
        //$this->Tax_Description = htmlspecialchars(strip_tags($this->Tax_Description));
        //$this->Final_Total_Amount = htmlspecialchars(strip_tags($this->Final_Total_Amount));
        //$this->Date_Added = htmlspecialchars(strip_tags($this->Date_Added));
        //$this->Added_By = htmlspecialchars(strip_tags($this->Added_By));
        
        //$this->Balance = htmlspecialchars(strip_tags($this->Balance));
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
        $this->Updated_By = 'Administrator';

        $stmt->bindParam(":Sales_ID" , $this->Sales_ID);
        //$stmt->bindParam(":Sales_Number" , $this->Sales_Number);
        //$stmt->bindParam(":Sales_Date" , $this->Sales_Date);
        $stmt->bindParam(":Customer_ID" , $this->Customer_ID);
        $stmt->bindParam(":Product_ID" , $this->Product_ID);
        $stmt->bindParam(":Tax_ID" , $this->Tax_ID);
        $stmt->bindParam(":Quantity" , $this->Quantity);
        $stmt->bindParam(":Total_Payment" , $this->Total_Payment);
        $stmt->bindParam(":Date_Updated" , $this->timestamp);
        $stmt->bindParam(":Updated_By" , $this->Updated_By);
 
        //$stmt->bindParam(":Total_Balance" , $this->Total_Balance);
        //$stmt->bindParam(":Discount_Type" , $this->Discount_Type);
        //$stmt->bindParam(":Discount_Percentage" , $this->Discount_Percentage);
        //$stmt->bindParam(":Discount_Amount" , $this->Discount_Amount);
        //$stmt->bindParam(":Tax_Percentage" , $this->Tax_Percentage);
        //$stmt->bindParam(":Tax_Amount" , $this->Tax_Amount);
        //$stmt->bindParam(":Tax_Description" , $this->Tax_Description);
        //$stmt->bindParam(":Final_Total_Amount" , $this->Final_Total_Amount);
        //$stmt->bindParam(":Date_Added" , $this->Date_Added);
        //$stmt->bindParam(":Added_By" , $this->Added_By);
       
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
 
    $query = "DELETE FROM " . $this->table_name . " WHERE Sales_ID = ?";
     
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

                    Sales_Number=:Sales_Number,
                    Sales_Date=:Sales_Date,
                    Customer_ID=:Customer_ID,
                    Product_ID=:Product_ID,
                    Payment_Type=:Payment_Type,
                    Tax_ID=:Tax_ID,
                    Quantity=:Quantity,
                    Total_Amount=:Total_Amount,
                    Total_Payment=:Total_Payment,
                    Total_Balance=:Total_Balance,
                    Profit=:Profit,
                    Discount_Amount=:Discount_Amount,
                    Tax_Percentage=:Tax_Percentage,
                    Tax_Amount=:Tax_Amount,
                    Tax_Description=:Tax_Description,
                    Final_Total_Amount=:Final_Total_Amount,
                    Date_Updated=:Date_Updated,
                    Updated_By =:Updated_By";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values

        ///$this->Sales_ID = htmlspecialchars(strip_tags($this->Sales_ID));
        $this->Sales_Number = htmlspecialchars(strip_tags($this->Sales_Number));
        $this->Sales_Date = htmlspecialchars(strip_tags($this->Sales_Date));
        $this->Customer_ID = htmlspecialchars(strip_tags($this->Customer_ID));
        $this->Product_ID = htmlspecialchars(strip_tags($this->Product_ID));
        $this->Tax_ID = htmlspecialchars(strip_tags($this->Tax_ID));
        $this->Quantity = htmlspecialchars(strip_tags($this->Quantity));
        $this->Total_Amount = htmlspecialchars(strip_tags($this->Total_Amount));
        $this->Total_Payment = htmlspecialchars(strip_tags($this->Total_Payment));
        $this->Total_Balance = htmlspecialchars(strip_tags($this->Total_Balance));
        $this->Profit = htmlspecialchars(strip_tags($this->Profit));
        //$this->Discount_Percentage = htmlspecialchars(strip_tags($this->Discount_Percentage));
        $this->Discount_Amount = htmlspecialchars(strip_tags($this->Discount_Amount));
        $this->Payment_Type = htmlspecialchars(strip_tags($this->Payment_Type));
        $this->Tax_Percentage = htmlspecialchars(strip_tags($this->Tax_Percentage));
        $this->Tax_Amount = htmlspecialchars(strip_tags($this->Tax_Amount));
        $this->Tax_Description = htmlspecialchars(strip_tags($this->Tax_Description));
        $this->Final_Total_Amount = htmlspecialchars(strip_tags($this->Final_Total_Amount));
        //$this->Date_Added = htmlspecialchars(strip_tags($this->Date_Added));
        //$this->Added_By = htmlspecialchars(strip_tags($this->Added_By));
        $this->Date_Updated = htmlspecialchars(strip_tags($this->Date_Updated));
        $this->Updated_By = htmlspecialchars(strip_tags($this->Updated_By));
        //$this->Balance = htmlspecialchars(strip_tags($this->Balance));
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
        $this->Added_By = 'Administrator';
 
        // bind values
        //$stmt->bindParam(":Sales_ID" , $this->Sales_ID);
        $stmt->bindParam(":Sales_Number" , $this->Sales_Number);
        $stmt->bindParam(":Sales_Date" , $this->Sales_Date);
        $stmt->bindParam(":Customer_ID" , $this->Customer_ID);
        $stmt->bindParam(":Product_ID" , $this->Product_ID);
        $stmt->bindParam(":Tax_ID" , $this->Tax_ID);
        $stmt->bindParam(":Quantity" , $this->Quantity);
        $stmt->bindParam(":Total_Amount" , $this->Total_Amount);
        $stmt->bindParam(":Total_Payment" , $this->Total_Payment);
        $stmt->bindParam(":Total_Balance" , $this->Total_Balance);
        $stmt->bindParam(":Profit" , $this->Profit);
        //$stmt->bindParam(":Discount_Percentage" , $this->Discount_Percentage);
        $stmt->bindParam(":Discount_Amount" , $this->Discount_Amount);
        $stmt->bindParam(":Payment_Type" , $this->Payment_Type);
        $stmt->bindParam(":Tax_Percentage" , $this->Tax_Percentage);
        $stmt->bindParam(":Tax_Amount" , $this->Tax_Amount);
        $stmt->bindParam(":Tax_Description" , $this->Tax_Description);
        $stmt->bindParam(":Final_Total_Amount" , $this->Final_Total_Amount);
        //$stmt->bindParam(":Date_Added" , $this->Date_Added);
        //$stmt->bindParam(":Added_By" , $this->Added_By);
        $stmt->bindParam(":Date_Updated" , $this->timestamp);
        $stmt->bindParam(":Updated_By" , $this->Updated_By);
 
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
 
    








}
?>