<?php include ('header.php'); ?>
<?php include ('nav/side_nav.php'); ?>

<div class="w3-container">
    <h5>Products</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 w3-table-all">
      
      <tr>
        <th>Name</th>
        <th>Brand</th>
        <th>Quantity</th>
        <th>Supplier</th>
        <th>DOM</th>
        <th>DOE</th>
        <th>Batch No.</th>
        <th>Action</th>
      </tr>

      <tr>
        <td>United States</td>
        <td>65%</td>
        <td>65%</td>
        <td>65%</td>
        <td>65%</td>
        <td>65%</td>
        <td>65%</td>
        <td>
			<div class="btn-group">
			  <a href="customerView.php">
			  	<button type="button" class="btn btn-success"><i class="fa fa-search"></i></button>
			  </a>

			  <a href="customerEdit.php">
			  	<button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button>
			  </a>

			  <a href="customerDelete.php">
			  	<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
			  </a>

			</div>	
        </td>
      </tr>

      <tr>
        <td>United States</td>
        <td>65%</td>
        <td>65%</td>
        <td>65%</td>
        <td>65%</td>
        <td>65%</td>
        <td>65%</td>
        <td>
			<div class="btn-group">
			  <a href="#">
			  	<button type="button" class="btn btn-success"><i class="fa fa-search"></i></button>
			  </a>

			  <a href="#">
			  	<button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button>
			  </a>

			  <a href="#">
			  	<button type="button" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
			  </a>

			</div>	
        </td>

      </tr>
     
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>




<?php include ('footer.php'); ?>