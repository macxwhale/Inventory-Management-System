
<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
    method="POST"> <!-- Form -->
  

    <div class="form-group">
    <label class="col-sm-4 control-label">Report </label>
    <div class="input-group col-sm-4">
   
    <select class="form-control" id="sel1" name="Category">
          <option value="Brands">Brands</option>
          <option value="Customers">Customers</option>
          <option value="Products">Products</option>
          <option value="Sales">Sales</option>
          <option value="Suppliers">Suppliers</option>
    </select>
    </div>
    </div>


    

    <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="input-group col-sm-4">
    <button type="submit" onClick="Redirect()" class="btn btn-primary" name="submit">Generate</button>&nbsp;
    <button type="button" class="btn btn-danger">Cancel</button>
    </div>
    </div>  

  </form> <!-- End of form -->


