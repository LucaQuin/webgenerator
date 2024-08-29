<?php 

function getConection($tabla, $query) {
		$con = mysqli_connect("localhost", "adm_webgenerator", "webgenerator2024", "webgenerator");
		$sql = $query;
		return(mysqli_query($con,$sql));
	}

function leerArchivoUser($arch,$sepa){
	$list=array();

    $nArch = fopen($arch,"r");

    while (!feof($nArch)) {
        $renglon= rtrim(fgets($nArch));
        if($renglon!=""){
            $list[] = explode($sepa, $renglon);
        }
    }
    fclose($nArch);
    return $list;
}

function getNewIdUser($arch){
        $aux=0;
        $list=leerArchivoUser($arch, "|");

        for ($i=1; $i < count($list)-1; $i++) { 
            if ($list[$i][0]<$list[$i+1][0]) {
                $aux=$list[$i+1][0]+1;
            }
        }
        return $aux;
    }
 ?>