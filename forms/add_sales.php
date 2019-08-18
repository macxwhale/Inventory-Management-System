 <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
    method="POST"> <!-- Form -->
    
    <!-- <div class="form-group">
      <label for="disabledInput" class="col-sm-4 control-label">Supplier Number</label>
      <div class="col-sm-8">
        <input class="form-control" id="disabledInput" type="text" 
        value="" name="Supplier_Number" disabled>
      </div>
    </div> -->

 
    <div class="form-group">
    <label for="dtp_input1" class="col-sm-4 control-label">Sales Date</label> 
    <div class="input-group date form_datetime col-md-4" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
    <input class="form-control" size="16" type="text" value="" readonly required="">
    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="dtp_input1" value="" 
    name="Sales_Date" required="required" /><br/>
    </div>

    <hr>
 

    <div class="form-group">
    <label class="col-sm-4 control-label">Customer Name</label>
    <div class="input-group col-sm-4">
    <?php if ($c_num>0) {?>
    <select class="form-control" id="sel1" name="Customer_ID">
    <?php 
        while ($c_row = $c_stmt->fetch(PDO::FETCH_ASSOC)){
        extract($c_row); 
            echo "<option value=\"{$Customer_ID}\">{$Customer_Name}</option>";
        
        }
    }
    ?>  
    </select>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Product Name</label>
    <div class="input-group col-sm-4">
    <?php if ($p_num>0) {?>
    <select class="form-control" id="sel1" name="Product_ID">
    <?php 
        while ($p_row = $p_stmt->fetch(PDO::FETCH_ASSOC)){
                 extract($p_row); 
                    echo "<option value=\"{$Product_ID}\">{$Product_N} {$Product_ID} </option>";
       
        }
    }
    ?>  
    </select>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Tax %</label>
    <div class="input-group col-sm-4">
    <?php if ($t_num>0) {?>
    <select class="form-control" id="sel1" name="Tax_ID">
    <?php 
        while ($t_row = $t_stmt->fetch(PDO::FETCH_ASSOC)){
        extract($t_row); 
            echo "<option value=\"{$Tax_ID}\">{$Tax_Percentage}</option>";
        
        }
    }
    ?>  
    </select>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Payment Type</label>
    <div class="input-group col-sm-4">
    <select class="form-control" id="sel1" name="Payment_Type">
  
        <option value="M-Pesa">M-Pesa</option>
        <option value="Cash Sale">Cash Sale</option>
        <option value="Credit Sale">Credit Sale</option>
    </select>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Quantity</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" name="Quantity" min="1" max="50000000"required="required">
    <span class="input-group-addon">KES</span>
    </div>
    </div>


   
    <div class="form-group">
    <label class="col-sm-4 control-label">Total Payment</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" name="Total_Payment" min="1" max="50000000"required="required">
    <span class="input-group-addon">KES</span>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-4">
    <button type="submit" class="btn btn-primary" name="submit">Add</button>
    <a href="/pos/read_sales.php"><button type="button" class="btn btn-danger">Cancel</button></a>
    </div>
    </div>  

  </form> <!-- End of form -->