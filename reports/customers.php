<?php 
$title = "Customers";
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
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Contact Person</th>
                <th>Type</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Balance</th>
                <th>Date Added</th>
                <th>Added By</th>
                <th>Date Updated</th>
                <th>Updated By</th>
            </tr>
        </thead>
 
        <tfoot>
                <th>ID</th>
                <th>UID</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Contact Person</th>
                <th>Type</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Balance</th>
                <th>Added</th>
                <th>Added By</th>
                <th>Updated</th>
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
         "sAjaxSource":"response/customers.php",
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
