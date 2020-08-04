<?php if(Auth::guest()): ?>

<?php else: ?>
 <div class="modal fade" id="showvcommentsModal";
     tabindex="-1" role="dialog" data-backdrop="static" 
     aria-labelledby="showvcommentsModalLabel">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
               
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

                    <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th>Comments</th>
                               
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                             
                                
                  
                        </table>   
                     
<?php endif; ?>