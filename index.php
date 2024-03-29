<?php 
$page_title = "Dashboard";
$header_title = "Home";
include("header.php");
include("nav/side_nav.php");




include_once 'config/database.php';
include_once 'objects/products.php';
include_once 'objects/suppliers.php';
include_once 'objects/customers.php';
include_once 'objects/sales.php';


// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to object
$p = new Product($db);
$su = new Supplier($db);
$c = new Customer($db);
$s = new Sale($db);

$total_p = $p->count_all();
$total_su = $su->countAll();
$total_c = $c->countAll();
$total_s = $s->countAll();



?>

  <div class="w3-row-padding w3-margin-bottom ">
    <div class="w3-quarter ">
      <div class="w3-container w3-red w3-padding-16 w3-card-4 w3-round">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $total_p; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Inventory</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16 w3-card-4 w3-round">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $total_su; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Suppliers</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16 w3-card-4 w3-round">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $total_c; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Customers</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16 w3-card-4 w3-round">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $total_s; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Sales</h4>
      </div>
    </div>
  </div>
  
  <hr>

 <!--################################################# --> 
<div class="w3-row">
  <div class="w3-col m3 l6">
    <canvas id="myChart" style="max-width: 500px;"></canvas>
  </div>
  <div class="w3-col m3 l6">
    <div id="piechart"></div>
  </div>
</div>

<!-- ################################################## -->
  <hr>
  <!-- ################################################## -->


<!-- ################################################## -->

  <!-- Stock -->
  <div class="w3-container">
    <h5>Inventory</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 ">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>

  <hr>


   <!-- Sales -->
  <div class="w3-container">
    <h5>Sales</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 ">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>

  <hr>

   <!-- Suppliers -->
  <div class="w3-container">
    <h5>Suppliers</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 ">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>

  <hr>

   <!-- Customers -->
  <div class="w3-container">
    <h5>Customers</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-card-4 ">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>

  <hr>



  <div class="w3-container">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr>

  
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

  
<?php include("footer.php"); ?>

