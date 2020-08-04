<!DOCTYPE html>
<html>
<head>
    <title>TechnipFMC.app - ElecDistBoards</title>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

</head>
<body>

<div class="container">
  <table id="delec_dist_boards" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Zone Name</th>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Status</th>
        </tr>
    </thead>
  </table>
</div>

<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#delec_dist_boards').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('datatable.getposts')); ?>",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'zone_name', name: 'zone_name'},
            {data: 'item_name', name: 'item_name'},
            {data: 'item_type', name: 'item_type'},
            {data: 'status_boards', name: 'status_boards'}
        ]
    });
});
</script>
</body>
</html>
