<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
    method="POST"> <!-- Form -->
  

    <div class="form-group">
    <label class="col-sm-4 control-label">Report </label>
    <div class="input-group col-sm-4">
   
    <select class="form-control" id="sel1" name="Category">
          <option value="">Sales</option>
          <option value="">Sales Per Customer</option>
          <option value="">Sales Per Product</option>
          <option value="">Profits</option>
          <option value="">Goods Returned</option>
          <option value="">Credit</option>
          <option value="">Expired Products</option>
    </select>
    </div>
    </div>


    <div class="form-group">
    <label for="dtp_input1" class="col-sm-4 control-label">From</label> 
    <div class="input-group date form_datetime col-md-4" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
    <input class="form-control" size="16" type="text" value="" readonly required="">
    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="dtp_input1" value="" 
    name="From"/><br/>
    </div>


    <div class="form-group">
    <label for="dtp_input1" class="col-sm-4 control-label">To</label> 
    <div class="input-group date form_datetime col-md-4" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
    <input class="form-control" size="16" type="text" value="" readonly required="">
    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="dtp_input1" value="" 
    name="To"/><br/>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="input-group col-sm-4">
    <button type="submit" class="btn btn-primary" name="submit">Generate</button>&nbsp;
    <button type="button" class="btn btn-danger">Cancel</button>
    </div>
    </div>  

  </form> <!-- End of form -->