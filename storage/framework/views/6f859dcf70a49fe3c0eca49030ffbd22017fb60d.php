<?php if(Auth::guest()): ?>

<?php else: ?>

<?php if(auth()->check() && auth()->user()->hasRole('DesignAdmin')): ?>



<?php $__env->startSection('content'); ?>

<script type="text/javascript">
                                
                                 window.onload = function() {

                                     document.getElementById("s5").style.fontWeight='bold';
                                     document.getElementById("s5").style.fontSize=10 + "pt";
                                     document.getElementById("s5").style.fontStyle="italic";;


                                 }

                            </script> 

 <div class="container">
        <div class="row" >
            <center><h2 style="padding-top: 7%"><b><i>IsoTracker</i></b></h2>
      <h3>Upload Isofiles</h3></center><br>
       
       <table style='width: 100%'>
        <td>
            <button onclick="location.href='<?php echo e(url('isostatus')); ?>'" type="button" class="btn btn-info btn-lg" style="width:38%"><b>Status</b></button>
       <button onclick="location.href='<?php echo e(url('hisoctrl')); ?>'" type="button" class="btn btn-info btn-lg" style="width:38%"><b>History</b>
        </button>
    </td>
        <td style='width: 64%'>
        <!-- TABLA DE TOTALES SEGUN STATUS -->
            <?php echo $__env->make('isoctrl.totalesbystatus', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- FIN TABLA DE TOTALES SEGUN STATUS -->
      </td>

    </table>
            <div style="margin-top: 2%" class="panel panel-default">
                <div class="panel-heading">
                    <!-- <h3>Dropzone</h3> -->
                    <button type="submit" class="btn btn-info btn-lg" id="submit" style="width:100%">Click here to Upload</button>
                </div>
                <div class="panel-body">

                    <?php echo Form::open(['route'=> 'file.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']); ?>

                    <div class="dz-message" style="height:200px;">
                        <h3 style="vertical-align: middle">Drop your isometric files here</h3>
                    </div>
                    <div class="dropzone-previews"></div>
                    
                    <?php echo Form::close(); ?>

                </div>

            </div>
            <center><h4><b>NOTE: Supported files (.pdf, .zip)</b><h4></center>
        </div>
    </div>
    <!-- BUTTONS   -->
    <br>
   <center>
       
        

        <button onclick="location.href='<?php echo e(url('design')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>Design</b></button>&nbsp;&nbsp;

        <button onclick="location.href='<?php echo e(url('stress')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>Stress</b></button>&nbsp;&nbsp;

        <button onclick="location.href='<?php echo e(url('supports')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>Supports</b></button>&nbsp;&nbsp;

        <button onclick="location.href='<?php echo e(url('materials')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>Materials</b></button>&nbsp;&nbsp;

        <button onclick="location.href='<?php echo e(url('lead')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>Issuer</b></button>&nbsp;&nbsp;

        <button onclick="location.href='<?php echo e(url('iso')); ?>'" type="button" class="btn btn-default btn-lg" style="width:9%"><b>LDE/Isocontrol</b></button>


    </center> 

     <script>
        Dropzone.options.myDropzone = {
            addRemoveLinks: true,
            acceptedFiles: ".pdf,.zip",
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 50,
            maxFiles: 10000,
            //parallelUploads:100,

            
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                //this.on("addedfile", function(file) {
               //     alert("file uploaded");
               //

                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });
 
                this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        }; 
    </script>


<?php $__env->stopSection(); ?>

<?php else: ?>
<?php echo $__env->make('common.forbidden', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endif; ?>

<?php endif; ?>
<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>