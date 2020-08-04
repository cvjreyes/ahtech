

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

    $progress_by_line= DB::select(DB::raw("SELECT COUNT( `dpipes`.`pdms_linenumber`) AS count,`dpipes`.`pdms_linenumber`,`pipesview`.`diameter`,`dpipes`.`pid`,`dpipes`.`iso`,`dpipes`.`stress`,`dpipes`.`support`,


                                (((SELECT `tpipes`.`pid` FROM tpipes WHERE `tpipes`.`hours`=`pipesview`.`hours`)*(`dpipes`.`pid`)+
                                (SELECT `tpipes`.`iso` FROM tpipes WHERE `tpipes`.`hours`=`pipesview`.`hours`)*(`dpipes`.`iso`)+
                                (SELECT `tpipes`.`stress` FROM tpipes WHERE `tpipes`.`hours`=`pipesview`.`hours`)*(`dpipes`.`stress`)+
                                (SELECT `tpipes`.`support` FROM tpipes WHERE `tpipes`.`hours`=`pipesview`.`hours`)*(`dpipes`.`support`))
                                /(SELECT `tpipes`.`hours` FROM tpipes WHERE `tpipes`.`hours`=`pipesview`.`hours`)) as total_progress

                                FROM dpipes JOIN epipes JOIN pipesview
                                WHERE (`dpipes`.`pdms_linenumber` = @pdms_linenumber)  AND (`pipesview`.`pdms_linenumber` = @pdms_linenumber) 
                                GROUP BY `pipesview`.`hours`,`dpipes`.`pdms_linenumber`,`dpipes`.`pid`,`dpipes`.`iso`,`dpipes`.`stress`,`dpipes`.`support`"));

    

    if(isset($progress_by_line[0]->total_progress)){

    	    echo "<font size='5' color='#2579A9'><b>".$progress_by_line[0]->pdms_linenumber."</b></font>"."<br><b>PROGRESS: ".$progress_by_line[0]->total_progress."%</b>"."<br>PID: ".$progress_by_line[0]->pid."%"."<br>ISO: ".$progress_by_line[0]->iso."%"."<br>STRESS: ".$progress_by_line[0]->stress."%"."<br>SUPPORT: ".$progress_by_line[0]->support."%";
    	}else{
    		
            echo "<font size='5' color='#2579A9'><b>".$pdms_linenumber[0]->pdms_linenumber."</b></font>";
            echo "<br>The pipeline has not been modeled";
    	}


?>
