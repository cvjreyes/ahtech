
<?php
if(isset($_POST["texto"]))

    $tablaclientes = DB::select("SELECT * FROM clientes WHERE id="."'".$_POST["texto"]."'");


        echo "<font size='5' color='#2579A9'><b>DNI ".$tablaclientes[0]->dni."</b></font>";

        echo "<div>";
                echo "<h4><b>".$tablaclientes[0]->apellidos.", ".$tablaclientes[0]->nombres."</b></h4>";
                echo "<h4>".$tablaclientes[0]->email."</h4>";
                echo "<h4>".$tablaclientes[0]->telefono."</h4>";
                echo "<h4><b>IBAN</b> ES".$tablaclientes[0]->iban."</h4>";
                echo "<h4><b>DNI</b> ".$tablaclientes[0]->dni."</h4>";
                echo "<h4><b><br>Dirección de Facturación:</b> <br><br>".$tablaclientes[0]->direccion."</h4>";
                echo "</div>";

   

?>
