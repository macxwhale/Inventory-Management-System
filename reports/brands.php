<?php 
$title = "Brands";
include_once('header.php');
?>

  
  <div class="container" style="padding:20px;20px;">
      <div class="">
        <h1><?php echo $title; ?></h1>
        <div class="">
    <table id="table" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Brand ID</th>
                <th>Brand UID</th>
                <th>Brand N</th>
                <th>Is Deleted</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Updated On</th>
                <th>Updated By</th>
            </tr>
        </thead>
 
        <tfoot>
                <th>Brand ID</th>
                <th>Brand UID</th>
                <th>Brand N</th>
                <th>Is Deleted</th>
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
         "sAjaxSource":"response/brands.php",
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
