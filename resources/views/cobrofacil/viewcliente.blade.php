@extends('layouts.datatable')

@section('content')


  <script type="text/javascript"> function controltag(e) {
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


               <form class="form-horizontal" role="form" method="POST" action="{{ url('/enviardatos') }}">
                {!! csrf_field() !!}

                   <div id="menu_sel" style="height: 50px;border-radius: 4px;transition:200ms" onMouseOver="this.style.background='#E0E0E0';" onMouseOut="this.style.background='white';"><a href="home" style="color:black;text-decoration:none;"><h3 style="padding-top: 5px" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='black'">&nbsp;&nbsp;<img src="{{ asset('images/file-icon.png') }}" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;Datos del Cliente</h3></div></a>


                    <?php 

            // Obtiene los datos del Cliente en base al usuario
            

            foreach ($datausers as $datauser) {
                
                echo "<div style='margin-left: 15%;'>";
                echo "<h4>".$datauser->apellidos.", ".$datauser->nombres."</h4>";
                echo "<h4>".$datauser->email."</h4>";
                echo "<h4>".$datauser->telefono."</h4>";
                echo "<h4><b>IBAN</b> ES".$datauser->iban."</h4>";
                echo "<h4><b>DNI</b> ".$datauser->dni."</h4>";
                echo "<h4><b><br>Dirección de Facturación:</b> <br><br>".$datauser->direccion."</h4>";
                echo "</div>";

            }


        ?>


                    <br><br>
                        <center>
                
                        <button onclick="location.href='{{ url('home') }}'" type="button" class="btn btn-default btn-lg" style="width:15%">Home</button>&nbsp;&nbsp;

                        </center>
             
        </div>
      </div>
    </div>
  </div>


@endsection
