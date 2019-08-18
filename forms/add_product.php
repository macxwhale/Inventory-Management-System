 <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
    method="POST"> <!-- Form -->

    <div class="form-group">
    <label class="col-sm-4 control-label">Supplier Name</label>
    <div class="input-group col-sm-4">
    <?php if ($s_num>0) {?>
    <select class="form-control" id="sel1" name="Supplier_ID">
    <?php 
        while ($row = $s_stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row); 
            echo "<option value=\"{$Supplier_ID}\">{$Supplier_Name}</option>";
        
        }
    } 
    ?>  
    </select>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Brand ID</label>
    <div class="input-group col-sm-4">
    <?php if ($b_num>0) {?>
    <select class="form-control" id="sel1" name="Brand_ID">
    <?php 
        while ($row = $b_stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row); 
            echo "<option value=\"{$Brand_ID}\">{$Brand_N}</option>";
        
        }
    }
    ?>  
    </select>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Product Name</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="text" name="Product_N" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Quantity</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" min="0" max="50000000"name="Quantity" required="required">
    <span class="input-group-addon">KES</span>
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Buying Price</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" min="1" max="50000000"name="Buying_Price" required="required">
    <span class="input-group-addon">KES</span>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Total Payment</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" min="1" max="50000000"name="Total_Payment" required="required">
    <span class="input-group-addon">KES</span>
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Selling Price</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" name="Selling_Price" required="required">
    <span class="input-group-addon">KES</span>
    </div>
    </div>


    <div class="form-group">
    <label for="dtp_input1" class="col-sm-4 control-label">Expiry Date</label> 
    <div class="input-group date form_datetime col-md-4" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
    <input class="form-control" size="16" type="text" value="" readonly required="required">
    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="dtp_input1" value="" name="Expiry_Date" required="required"><br/>
    </div>

    <hr>

    <!-- <div class="form-group">
    <label class="col-sm-4 control-label">In Stock</label>
    <div class="col-sm-8">

    <label class="checkbox-inline">
        <input type="radio" name="In_Stock" 
        <?php //if (isset($In_Stock) && $In_Stock == "Y") echo "checked"; ?> value="Y"> YES
    </label>

    <label class="checkbox-inline">
        <input type="radio" name="In_Stock" 
        <?php //if (isset($In_Stock) && $In_Stock == "N") echo "checked"; ?> value="N"> NO
    </label>
    </div>
    </div> -->


    <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-4">
    <button type="submit" class="btn btn-primary" name="submit">Add</button>
    <a href="/pos/read_products.php"><button type="button" class="btn btn-danger">Cancel</button></a>
    </div>
    </div>  

  </form> <!-- End of form -->