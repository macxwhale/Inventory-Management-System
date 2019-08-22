<?php 
$title = "Sales";
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
                <th>Sales Date</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Tax</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Payment</th>
                <th>Balance</th>
                <th>Profit</th>
                <th>Discount Percentage</th>
                <th>Payment Type</th>
                <th>Discount Amount</th>
                <th>Tax Percentage</th>
                <th>Tax Amount</th>
                <th>Tax Description</th>
                <th>Final Total_Amount</th>
                <th>Date Added</th>
                <th>Added By</th>
                <th>Date Updated</th>
                <th>Updated By</th>
            </tr>
        </thead>
 
        <tfoot>
                <th>ID</th>
                <th>UID</th>
                <th>Sales Date</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Tax</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Payment</th>
                <th>Balance</th>
                <th>Profit</th>
                <th>Discount Percentage</th>
                <th>Payment Type</th>
                <th>Discount Amount</th>
                <th>Tax Percentage</th>
                <th>Tax Amount</th>
                <th>Tax Description</th>
                <th>Final Total_Amount</th>
                <th>Date Added</th>
                <th>Added By</th>
                <th>Date Updated</th>
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
         "sAjaxSource":"response/sales.php",
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
