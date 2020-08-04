

<?php
if(isset($_POST["texto"]))
{
	// if($_POST["texto"])
	// 	echo "He recibido en el archivo.php: ".$_POST["texto"];
	// else
	// 	echo "He recibido un campo vacio";
}

    $pdms_linenumber = DB::select("SELECT pdms_linenumber FROM pipesview WHERE id=".$_POST["texto"]);


    DB::statement(DB::raw("SET @pdms_linenumber = '".$pdms_linenumber[0]->pdms_linenumber."'"));

    $progress_by_line= DB::select(DB::raw("SELECT `dpipes`.`pdms_linenumber`,`pipesview`.`diameter`,`dpipes`.`pid`,`dpipes`.`iso`,`dpipes`.`stress`,`dpipes`.`support`,


                                (((SELECT `tpipes`.`pid` FROM tpipes WHERE `tpipes`.`hours`=`pipesview`.`hours`)*(`dpipes`.`pid`)+
                                (SELECT `tpipes`.`iso` FROM tpipes WHERE `tpipes`.`hours`=`pipesview`.`hours`)*(`dpipes`.`iso`)+
                                (SELECT `tpipes`.`stress` FROM tpipes WHERE `tpipes`.`hours`=`pipesview`.`hours`)*(`dpipes`.`stress`)+
                                (SELECT `tpipes`.`support` FROM tpipes WHERE `tpipes`.`hours`=`pipesview`.`hours`)*(`dpipes`.`support`))
                                /(SELECT `tpipes`.`hours` FROM tpipes WHERE `tpipes`.`hours`=`pipesview`.`hours`)) as total_progress

                                FROM dpipes JOIN epipes JOIN pipesview
                                WHERE (`dpipes`.`pdms_linenumber` = @pdms_linenumber)  AND (`pipesview`.`pdms_linenumber` = @pdms_linenumber) 
                                GROUP BY `pipesview`.`hours`,`dpipes`.`pdms_linenumber`,`dpipes`.`pid`,`dpipes`.`iso`,`dpipes`.`stress`,`dpipes`.`support`"));

    if(isset($progress_by_line[0]->total_progress)){

    	    echo "'".$progress_by_line[0]->pdms_linenumber."'"." Pid: ".$progress_by_line[0]->pid." Iso: ".$progress_by_line[0]->iso." Stress: ".$progress_by_line[0]->stress." Support: ".$progress_by_line[0]->support." Progress: ".$progress_by_line[0]->total_progress."%";
    	}else{
    		echo "The pipeline ".$pdms_linenumber[0]->pdms_linenumber. " has not been modeled";
    	}


?>
