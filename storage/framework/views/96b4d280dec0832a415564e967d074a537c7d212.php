

<?php $__env->startSection('content'); ?>

  <script type="text/javascript"> 

    // SOLO NUMEROS
      function controltag(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        else if (tecla==0||tecla==9)  return true;
       // patron =/[0-9\s]/;// -> solo letras
        patron =/[0-9\s]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }


  </script>


       <div class="col-md-4 col-md-offset-4" style="margin-top: 5%">
        <div class="panel panel-default" style="border-radius: 20px;">
          <div class="panel-heading" style="background-color: #FAFAFA;border-radius: 20px 20px 0px 0px;"> 

            <div class="panel-body">


               <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/enviardatos')); ?>">
                <?php echo csrf_field(); ?>


                   <div id="menu_sel" style="height: 50px;border-radius: 4px;transition:200ms" onMouseOver="this.style.background='#E0E0E0';" onMouseOut="this.style.background='white';"><a href="home" style="color:black;text-decoration:none;"><h3 style="padding-top: 5px" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="<?php echo e(asset('images/file-icon.png')); ?>" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;Datos del Cliente</h3></div></a>


                    <?php 

            // Obtiene los datos del Cliente en base al usuario
            

            foreach ($datausers as $datauser) {
                
                echo "<div style='margin-left: 15%;'>";
                echo "<h4>".$datauser->apellidos.", ".$datauser->nombres."</h4>";
                echo "<h4>".$datauser->email."</h4>";
                echo "<h4>".$datauser->telefono."</h4>";
                echo "</div>";

            }


        ?>



        <div style='margin-left: 15%;'>

          <br><h4><b>Complete y/o modifique sus datos:</b></h4>

          <br>IBAN(*): ES <?php echo Form::text('iban', $datauser->iban, array( 'style' =>'width:175px','class' => 'iban','maxlength' =>22,'minlength' =>22,'onkeypress' => 'return controltag(event)','required')); ?>


          &nbsp;&nbsp;DNI: <?php echo Form::text('dni', $datauser->dni, array('style' =>'width:70px','class' => 'dni','maxlength' =>8,'minlength' =>8,'onkeypress' => 'return controltag(event)')); ?>

        
          <br><br>Dirección de Facturación:
          <br><?php echo e(Form::textarea('direccion', $datauser->direccion, ['class' => 'direccion' , 'cols' => 50, 'rows' =>10, 'maxlength' => "400"])); ?>



      </div>

                    <br><br>
                        <center>
                
                        <input type="submit" class="btn btn-success btn-lg" style="padding: 8px 16px;font-size: 18px;" value="Enviar">
                        <button onclick="location.href='<?php echo e(url('viewcliente')); ?>'" type="button" class="btn btn-default btn-lg" style="width:15%">Ver</button>&nbsp;&nbsp;

                        </center>
             
        </div>
      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>