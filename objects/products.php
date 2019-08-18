<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "products";
 
    // object properties
    public $Product_UID;
    public $Product_ID;
    public $Product_N;
    public $Supplier_ID;
    public $Brand_ID;
    public $Tax_ID;
    public $Quantity;
    public $Buying_Price;
    public $Selling_Price;
    public $Profit;
    public $In_Stock;
    public $Notes;
    public $Created_On;
    public $Created_By;
    public $Updated_On;
    public $Updated_By;

    public function __construct($db){
        $this->conn = $db;
    }


    // create product
    public function create(){
        try {
            //write query
            $query = "INSERT INTO
            " . $this->table_name . "
            SET
                Product_UID=:Product_UID,
                Product_N=:Product_N,
                Supplier_ID=:Supplier_ID,
                Brand_ID=:Brand_ID,
                Quantity=:Quantity,
                Total_Payment=:Total_Payment,
                Buying_Price=:Buying_Price,
                Selling_Price=:Selling_Price,
                Profit=:Profit,
                Balance=:Balance,
                In_Stock=:In_Stock,
                Expiry_Date=:Expiry_Date,
                Created_On=:Created_On,
                Created_By=:Created_By,
                Updated_On=:Updated_On,
                Updated_By=:Updated_By";

            $stmt = $this->conn->prepare($query);
    // posted values
    $this->Product_UID = htmlspecialchars(strip_tags($this->Product_UID));
    $this->Product_N = htmlspecialchars(strip_tags($this->Product_N));
    $this->Supplier_ID = htmlspecialchars(strip_tags($this->Supplier_ID));
    $this->Brand_ID = htmlspecialchars(strip_tags($this->Brand_ID));
    //$this->Tax_ID = htmlspecialchars(strip_tags($this->Tax_ID));
    $this->Buying_Price = htmlspecialchars(strip_tags($this->Buying_Price));
    $this->Selling_Price = htmlspecialchars(strip_tags($this->Selling_Price));
    $this->Profit = htmlspecialchars(strip_tags($this->Profit));
    $this->Balance = htmlspecialchars(strip_tags($this->Balance));
    $this->In_Stock = htmlspecialchars(strip_tags($this->In_Stock));
    $this->Expiry_Date = htmlspecialchars(strip_tags($this->Expiry_Date));
    $this->Created_On = htmlspecialchars(strip_tags($this->Created_On));
    $this->Created_By = htmlspecialchars(strip_tags($this->Created_By));
    $this->Updated_On = htmlspecialchars(strip_tags($this->Updated_On));
    $this->Updated_By = htmlspecialchars(strip_tags($this->Updated_By));
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
        $this->Created_By = 'Administrator';
        $this->Updated_By = 'Administrator';
 
        // bind values
        $stmt->bindParam(":Product_UID", $this->Product_UID);
        $stmt->bindParam(":Product_N", $this->Product_N);
        $stmt->bindParam(":Supplier_ID", $this->Supplier_ID);
        $stmt->bindParam(":Brand_ID", $this->Brand_ID);
        $stmt->bindParam(":Expiry_Date", $this->Expiry_Date);
        $stmt->bindParam(":Total_Payment", $this->Total_Payment);
        $stmt->bindParam(":Quantity", $this->Quantity);
        $stmt->bindParam(":Buying_Price", $this->Buying_Price);
        $stmt->bindParam(":Selling_Price", $this->Selling_Price);
        $stmt->bindParam(":Profit", $this->Profit);
        $stmt->bindParam(":Balance", $this->Balance);
        $stmt->bindParam(":In_Stock", $this->In_Stock);
        $stmt->bindParam(":Created_On", $this->timestamp);
        $stmt->bindParam(":Created_By", $this->Created_By);
        $stmt->bindParam(":Updated_On", $this->timestamp);
        $stmt->bindParam(":Updated_By", $this->Updated_By);
 
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



    function read_all($from_record_num, $records_per_page){
 
    $query = "SELECT
                Products.Product_ID,
                Products.Product_UID,
                Products.Product_N,
                Suppliers.Supplier_Name,
                Brands.Brand_N,
                Products.Quantity,
                Products.Buying_Price,
                Products.Selling_Price,
                Products.Profit,
                Products.In_Stock,
                Products.Created_On,
                Products.Created_By,
                Products.Updated_On,
                Products.Updated_By
            FROM
                " . $this->table_name . "
            INNER JOIN 
                Suppliers  
            ON 
                Products.Supplier_ID = Suppliers.Supplier_ID 
            INNER JOIN
                Brands 
            ON        
                Products.Brand_ID = Brands.Brand_ID   
            ORDER BY
                Product_ID ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
    }


    // used for paging products
    public function countAll(){
     
        $query = "SELECT Product_ID FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    function readOne(){
 
        $query = "SELECT
                        Stock_Id,
                        Category,
                        Supplier_Number,
                        Stock_Number,
                        Stock_Name,
                        Unit_Of_Measurement,
                        Purchasing_Price,
                        Selling_Price,
                        Quantity,
                        Notes,
                        Date_Added,
                        Added_By,
                        Date_Updated,
                        Updated_By
                 FROM
                    " . $this->table_name . "
                WHERE
                    Stock_Id = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->Stock_Id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->Stock_Id = $row['Stock_Id'];
        $this->Category = $row['Category'];
        $this->Supplier_Number = $row['Supplier_Number'];
        $this->Stock_Number = $row['Stock_Number'];
        $this->Stock_Name = $row['Stock_Name'];
        $this->Unit_Of_Measurement = $row['Unit_Of_Measurement'];
        $this->Purchasing_Price = $row['Purchasing_Price'];
        $this->Selling_Price = $row['Selling_Price'];
        $this->Quantity = $row['Quantity'];
        $this->Notes = $row['Notes'];
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
                Product_N=:Product_N,
                Supplier_ID=:Supplier_ID,
                Brand_ID=:Brand_ID,
                Quantity=:Quantity,
                Buying_Price=:Buying_Price,
                Total_Payment=:Total_Payment,
                Selling_Price=:Selling_Price,
                In_Stock=:In_Stock,
                Updated_On=:Updated_On,
                Updated_By=:Updated_By

            WHERE
                Product_ID = :Product_ID";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
        $this->Product_ID = htmlspecialchars(strip_tags($this->Product_ID));
        $this->Product_N = htmlspecialchars(strip_tags($this->Product_N));
        $this->Supplier_ID = htmlspecialchars(strip_tags($this->Supplier_ID));
        $this->Brand_ID = htmlspecialchars(strip_tags($this->Brand_ID));
        $this->Total_Payment = htmlspecialchars(strip_tags($this->Total_Payment));
        $this->Quantity = htmlspecialchars(strip_tags($this->Quantity));
        $this->Buying_Price = htmlspecialchars(strip_tags($this->Buying_Price));
        $this->Selling_Price = htmlspecialchars(strip_tags($this->Selling_Price));
        $this->In_Stock = htmlspecialchars(strip_tags($this->In_Stock));
        $this->Updated_On = htmlspecialchars(strip_tags($this->Updated_On));
        $this->Updated_By = htmlspecialchars(strip_tags($this->Updated_By));

 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
        $this->Updated_By = 'Administrator';
 
        // bind values
        $stmt->bindParam(":Product_ID", $this->Product_ID);
        $stmt->bindParam(":Product_N", $this->Product_N);
        $stmt->bindParam(":Supplier_ID", $this->Supplier_ID);
        $stmt->bindParam(":Brand_ID", $this->Brand_ID);
        $stmt->bindParam(":Total_Payment", $this->Total_Payment);
        $stmt->bindParam(":Quantity", $this->Quantity);
        $stmt->bindParam(":Buying_Price", $this->Buying_Price);
        $stmt->bindParam(":Selling_Price", $this->Selling_Price);
        $stmt->bindParam(":In_Stock", $this->In_Stock);
        $stmt->bindParam(":Updated_On", $this->timestamp);
        $stmt->bindParam(":Updated_By", $this->Updated_By);
 
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
 
    $query = "DELETE FROM " . $this->table_name . " WHERE Product_ID = ?";
     
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
 
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}




    function select(){
 
    $query = "SELECT
               *
            FROM
                " . $this->table_name . "
            ORDER BY
                Stock_Name ASC";
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
    }
 


##################################################
    // used for paging products
    public function count_all(){
     
        $query = "SELECT Product_ID FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }


######################################################################
     public function select_one(){

        $query = "SELECT
                    Products.Product_ID,
                    Products.Product_UID,
                    Products.Product_N,
                    Suppliers.Supplier_Name,
                    Brands.Brand_N,
                    Products.Quantity,
                    Products.Buying_Price,
                    Products.Selling_Price,
                    Products.Profit,
                    Products.In_Stock,
                    Products.Created_On,
                    Products.Created_By,
                    Products.Updated_On,
                    Products.Updated_By
                 FROM
                    " . $this->table_name . "
                    INNER JOIN 
                        Suppliers  
                    ON 
                        Products.Supplier_ID = Suppliers.Supplier_ID 
                    INNER JOIN
                        Brands 
                    ON        
                        Products.Brand_ID = Brands.Brand_ID 
                WHERE
                    Product_ID = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->Product_ID);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->Product_ID = $row['Product_ID'];
        $this->Product_UID = $row['Product_UID'];
        $this->Product_N = $row['Product_N'];
        $this->Supplier_Name = $row['Supplier_Name'];
        $this->Brand_N = $row['Brand_N'];
        //$this->Tax_Percentage = $row['Tax_Percentage'];
        $this->Quantity = $row['Quantity'];
        $this->Buying_Price = $row['Buying_Price'];
        $this->Selling_Price = $row['Selling_Price'];
        $this->Profit = $row['Profit'];
        $this->In_Stock = $row['In_Stock'];
        $this->Created_On = $row['Created_On'];
        $this->Created_By = $row['Created_By'];
        $this->Updated_On = $row['Updated_On'];
        $this->Updated_By = $row['Updated_By'];
       
    }


####################################
    public function select_all(){
 
        $query = "SELECT * FROM " . $this->table_name . "
                ORDER BY
                    Product_N";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }

    ########################################
    function update_q(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
                Quantity=:Quantity,
               In_Stock=:In_Stock,
                Updated_On=:Updated_On,
                Updated_By=:Updated_By

            WHERE
                Product_ID = :Product_ID";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
        $this->Product_ID = htmlspecialchars(strip_tags($this->Product_ID));
        $this->Quantity = htmlspecialchars(strip_tags($this->Quantity));
        $this->In_Stock = htmlspecialchars(strip_tags($this->In_Stock));
        $this->Updated_On = htmlspecialchars(strip_tags($this->Updated_On));
        $this->Updated_By = htmlspecialchars(strip_tags($this->Updated_By));

 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
        $this->Updated_By = 'Administrator';
 
        // bind values
        $stmt->bindParam(":Product_ID", $this->Product_ID);
       
        $stmt->bindParam(":Quantity", $this->Quantity);
        $stmt->bindParam(":In_Stock", $this->In_Stock);
        $stmt->bindParam(":Updated_On", $this->timestamp);
        $stmt->bindParam(":Updated_By", $this->Updated_By);
 
        // execute the query
        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
 
    

    echo $query;
     
    }

}
?>