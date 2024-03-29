
<!-- Top container -->
<div class="w3-bar w3-top w3-light-grey w3-large w3-card-4" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" 
  onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
  <a href="#" class="w3-bar-item w3-button">Home</a>
  <a href="read_brands.php" class="w3-bar-item w3-button">Brands</a>
  <a href="read_tax.php" class="w3-bar-item w3-button">Tax</a>
</div>



<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left w3-card-4" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">

    <!--    -->
    <div class="w3-col s4">
      <img src="images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <!--    -->

    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Mike</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>

    <!--    -->
  </div> <!--End of w3-container w3-row   -->

  <hr>

  <!--    -->
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <!--    -->

  <!--    -->
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>

    <a href="index.php" class="w3-bar-item w3-button w3-padding">
      <i class="fa fa-users fa-fw"></i>  Overview</a>

    <a href="read_customers.php" class="w3-bar-item w3-button w3-padding">
      <i class="fa fa-bullseye fa-fw"></i>  Customers</a> 

    <a href="read_suppliers.php" class="w3-bar-item w3-button w3-padding">
      <i class="fa fa-users fa-fw"></i>  Suppliers</a>

    <a href="read_products.php" class="w3-bar-item w3-button w3-padding">
      <i class="fa fa-eye fa-fw"></i>  Products</a>  

    <a href="read_sales.php" class="w3-bar-item w3-button w3-padding">
      <i class="fa fa-diamond fa-fw"></i>  Sales</a>

     <a href="reports.php" class="w3-bar-item w3-button w3-padding">
      <i class="fa fa-diamond fa-fw"></i>  Reports</a>
    
  </div>
  <!--    -->

</nav> <!--  End of Nav tag  -->


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<!-- Page Container -->
<div class="w3-container">

<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <div class="w3-col m4 l8">
        <h3><b><?php echo $page_title; ?></b></h3>
    </div>

    <?php 


      if ($_SERVER["PHP_SELF"] ==  "/pos/read_products.php" ) {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } elseif ($_SERVER["PHP_SELF"] == "/pos/read_customers.php") {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } elseif ($_SERVER["PHP_SELF"] == "/pos/read_suppliers.php") {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } elseif ($_SERVER["PHP_SELF"] == "/pos/read_sales.php") {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } elseif ($_SERVER["PHP_SELF"] == "/pos/read_brands.php") {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } elseif ($_SERVER["PHP_SELF"] == "/pos/read_purchases.php") {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } elseif ($_SERVER["PHP_SELF"] == "/pos/read_tax.php") {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } else {

      }



    ?>

    
    
</header>




<hr>
