  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey footer">
    <h4>Copyright 2018</h4>
    <p>Powered by <a href="#" target="_blank">Maxwell Ambenge</a></p>
  </footer>
  </div> <!-- End of page container -->
</div> <!-- End page content -->
<script>

// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}


// JavaScript for deleting product
$(document).on('click', '.delete-object', function(){
 
    var id = $(this).attr('delete-id');
 
    bootbox.confirm({
        message: "<h4>Are you sure?</h4>",
        buttons: {
            confirm: {
                label: '<span class="glyphicon glyphicon-ok"></span> Yes',
                className: 'btn-danger'
            },
            cancel: {
                label: '<span class="glyphicon glyphicon-remove"></span> No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
 
            if(result==true){
                $.post('delete_customer.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Unable to delete.');
                });
            } 

            if(result==true){
                $.post('delete_supplier.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Unable to delete.');
                });
            } 

            if(result==true){
                $.post('delete_stock.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Unable to delete.');
                });
            } 

            if(result==true){
                $.post('delete_sale.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Unable to delete.');
                });
            } 

            if(result==true){
                $.post('delete_stock_cat.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Unable to delete.');
                });
            }

            if(result==true){
                $.post('delete_purchase.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Unable to delete.');
                });
            }


        }
    });
 
    return false;
});




</script>

</body>
</html>