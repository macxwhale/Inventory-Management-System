
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" 
  onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
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

    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="read_stock.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Stock</a>
    <a href="read_suppliers.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Suppliers</a>
    <a href="read_customers.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Customers</a>
    <a href="read_sales.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Sales</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding "><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
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
    <div class="w3-col m4 l9">
        <h3><b><?php echo $page_title; ?></b></h3>
    </div>

    <?php 


      if ($_SERVER["PHP_SELF"] ==  "/pos/read_stock.php") {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } elseif ($_SERVER["PHP_SELF"] == "/pos/read_customers.php") {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } elseif ($_SERVER["PHP_SELF"] == "/pos/read_suppliers.php") {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } elseif ($_SERVER["PHP_SELF"] == "/pos/read_sales.php") {
        echo "<a href=\" $page_link \" class=\"w3-btn w3-blue w3-round\"> $page_action </a>";
      } else {

      }

    ?>
    
</header>
<hr>
