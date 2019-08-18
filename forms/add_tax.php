 <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
    method="POST"> <!-- Form -->




    <div class="form-group">
    <label class="col-sm-4 control-label">Tax Name</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="text" name="Tax_N" required="required">
    </div>
    </div>

    <div class="form-group">
    <label class="col-sm-4 control-label">Tax Percentage</label>
    <div class="input-group col-sm-4">
    <input class="form-control" id="focusedInput" type="number" name="Tax_Percentage" min="1" max="100"required="required">
    <span class="input-group-addon">%</span>
    </div>
    </div>

    

    <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-4">
    <button type="submit" class="btn btn-primary" name="submit">Add</button>
    <button type="button" class="btn btn-danger">Cancel</button>
    </div>
    </div>  

  </form> <!-- End of form -->