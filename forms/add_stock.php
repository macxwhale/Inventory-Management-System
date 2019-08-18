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
    <label class="col-sm-4 control-label">Category </label>
    <div class="input-group col-sm-4">
    <?php if ($stock_cat_num>0) {?>
    <select class="form-control" id="sel1" name="Category">
    <?php 
        while ($st_row = $stock_cat_stmt->fetch(PDO::FETCH_ASSOC)){
        extract($st_row); 
            echo "<option value=\"{$Category_ID}\">{$Category_Name}</option>";
        
        }
    }
    ?>   

    </select>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Supplier Number</label>
    <div class="input-group col-sm-4">
    <?php if ($supplier_num>0) {?>
    <select class="form-control" id="sel1" name="Supplier_Number">
    <?php 
        while ($s_row = $supplier_stmt->fetch(PDO::FETCH_ASSOC)){
        extract($s_row); 
            echo "<option value=\"{$Supplier_Number}\">{$Supplier_Name}</option>";
        
        }
    }
    ?>   
    </select>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Stock Name</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="text" name="Stock_Name" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Unit Of Measurement</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="text" name="Unit_Of_Measurement" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Purchasing Price</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" name="Purchasing_Price" min="1" max="50000000" required="required">
    <span class="input-group-addon">KES</span>
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Selling Price</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" name="Selling_Price" min="1" max="50000000" required="required">
    <span class="input-group-addon">KES</span>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Quantity</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" name="Quantity" min="1" max="50000000" required="required">
    <span class="input-group-addon">#</span>
    </div>
    </div>


    <div class="form-group">
    <label class="col-sm-4 control-label">Notes</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="text" name="Notes" required="required">
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