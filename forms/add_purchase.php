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
    <label for="dtp_input1" class="col-sm-4 control-label">Purchase Date</label> 
    <div class="input-group date form_datetime col-md-4" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
        <input class="form-control" size="16" type="text" value="" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="dtp_input1" value="" name="Purchase_Date"/><br/>
    </div>

    <hr>


    <div class="form-group">
    <label class="col-sm-4 control-label">Supplier Name</label>
    <div class="input-group col-sm-4">
    <?php if ($supplier_num>0) {?>
    <select class="form-control" id="sel1" name="Supplier_ID">
    <?php 
        while ($s_row = $supplier_stmt->fetch(PDO::FETCH_ASSOC)){
        extract($s_row); 
            echo "<option value=\"{$Supplier_ID}\">{$Supplier_Name}</option>";
        
        }
    }
    ?>   
    </select>
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Brand Name</label>
    <div class="input-group col-sm-4">
    <?php if ($brand_num>0) {?>
    <select class="form-control" id="sel1" name="Brand_ID">
    <?php 
        while ($b_row = $brand_stmt->fetch(PDO::FETCH_ASSOC)){
        extract($b_row); 
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
    <?php if ($product_num>0) {?>
    <select class="form-control" id="sel1" name="Product_ID">
    <?php 
        while ($p_row = $product_stmt->fetch(PDO::FETCH_ASSOC)){
        extract($p_row); 
            echo "<option value=\"{$Product_ID}\">{$Product_N}</option>";
        
        }
    }
    ?>   
    </select>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Quantity</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" name="Quantity" min="1" max="50000000"required="required">
    <span class="input-group-addon"></span>
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Total Payment</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" name="Total Payment" min="1" max="50000000"required="required">
    <span class="input-group-addon">KES</span>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="input-group col-sm-4">
    <button type="submit" class="btn btn-primary" name="submit">Add</button>
    <button type="button" class="btn btn-danger">Cancel</button>
    </div>
    </div>	

  </form> <!-- End of form -->
