<?php 
$title = "Products";
include_once('header.php');
?>  
  <div class="container" style="padding:20px;20px;">
      <div class="">
          <h1><?php echo $title; ?></h1>
        <div class="">
    <table id="table" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>UID</th>
                <th>Name</th>
                <th>Supplier</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Payment</th>
                <th>Balance</th>
                <th>Profit</th>
                <th>In Stock</th>
                <th>Returned</th>
                <th>Expirty Date</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Updated On</th>
                <th>Updated By</th>
            </tr>
        </thead>
 
        <tfoot>
                <th>ID</th>
                <th>UID</th>
                <th>Name</th>
                <th>Supplier</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Payment</th>
                <th>Balance</th>
                <th>Profit</th>
                <th>In Stock</th>
                <th>Returned</th>
                <th>Expirty Date</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Updated On</th>
                <th>Updated By</th>
        </tfoot>
    </table>
    </div>
      </div>

    </div>
<script type="text/javascript">
$( document ).ready(function() {
$('#table').DataTable({
     "processing": true,
         "sAjaxSource":"response/products.php",
     "dom": 'lBfrtip',
     "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ]
        });
});
</script>
