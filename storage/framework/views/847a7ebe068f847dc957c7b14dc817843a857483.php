<!--     <link href="<?php echo asset('css/all.css'); ?>" media="all" rel="stylesheet" type="text/css" /> -->
    <!-- <script type="text/javascript" src="<?php echo asset('js/app.min.js'); ?>"></script> -->
  
<?php if(Auth::guest()): ?>

<?php else: ?>



<?php $__env->startSection('content'); ?>
                        <script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s3").style.fontWeight='bold';
                                     document.getElementById("s3").style.fontSize=10 + "pt";
                                     document.getElementById("s3").style.fontStyle="italic";;


                                 }

                            </script>  
<!DOCTYPE html>
<html>
<head>
    <title>TechnipFMC.app - Electrical Distribution Boards</title>

    <link href="<?php echo asset('css/app.css'); ?>" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/jquery.dataTables.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<!--     <link href="<?php echo asset('css/tabulator.min.css'); ?>" media="all" rel="stylesheet" type="text/css" /> -->

    <script type="text/javascript" src="<?php echo asset('js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/dataTables.buttons.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/dataTables.select.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/dataTables.keyTable.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/dataTables.editor.min.js'); ?>"></script>
<!--     <script type="text/javascript" src="<?php echo asset('js/tabulator.min.js'); ?>"></script> -->

</head>
<body>
<div id="fixhead" style="width:100%;background-color: #f5f8fa; position: fixed;z-index: 1;">
<br>
<!-- <img src="<?php echo e(asset('images/tpfmc_logo.png')); ?>" style="width:400px;position: absolute; left:20%; top:40px" >-->
<img src="<?php echo e(asset('images/total_logo.png')); ?>" style="width:10%;position: absolute; left:70%; top:30%" > 
<br>
<br>
<br>
<br>
<br>
<center><a href="home"><h4>Dashboard</h4></a></center>
<center><h1>Progress - Electrical Distribution Boards</h1></center><br>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <table id="delecdistboards" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>

            <th>Zone Name</th>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Progress</th>
        </tr>
    </thead>
  </table>
</div>

<!-- <script>
   var editor;  
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "<?php echo e(route('delecdistboardsdatatable.delecdistboardsgetposts')); ?>",
        table: "#delecdistboards",
        fields: [ {
                label: "zone_name:",
                name: "zone_name"
            }, {
                label: "item_name:",
                name: "item_name"
            }, {
                label: "item_type:",
                name: "item_type'"
            }, {
                label: "status_boards:",
                name: "status_boards"
            }
        ]
    } );
 
    // Activate an inline edit on click of a table cell
    $('#delecdistboards').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    } );
 
    $('#delecdistboards').DataTable( {
        dom: "Bfrtip",
        ajax: "<?php echo e(route('delecdistboardsdatatable.delecdistboardsgetposts')); ?>",
        order: [[ 1, 'asc' ]],
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            { data: "zone_name" },
            { data: "item_name" },
            { data: "item_type" },
            { data: "status_boards" }

        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );


</script> -->



<script type="text/javascript">

$(document).ready(function() {


    
    
    $('#delecdistboards').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    } );
    oTable = $('#delecdistboards').DataTable({

        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('delecdistboardsdatatable.delecdistboardsgetposts')); ?>",
        "columns": [
            {data: 'zone_name', name: 'zone_name'},
            {data: 'item_name', name: 'item_name'},
            {data: 'item_type', name: 'item_type'},
            {data: 'status_boards', name: 'status_boards'},

        ]
    });
});
</script>
<br>
<br>
<br>
<br>
<?php echo $__env->make('common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
</div>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>