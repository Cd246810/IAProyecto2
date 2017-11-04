<?php
$arregloTemporal = str_split(htmlspecialchars($_GET["estado"]) );
echo 'Turno de ' . htmlspecialchars($_GET["turno"]) . ' con los valores: '.htmlspecialchars($_GET["estado"]).'!';
echo('<br>');
$turno=htmlspecialchars($_GET["turno"]);
echo('turno:'.$turno.'<br>');
$filas=0;
$columnas=0;
$maximoFilas=8;
$maximoColumnas=8;
$arregloFilas=array();
$arregloFichas=array();
for($numeroTemporal=0;$numeroTemporal<count($arregloTemporal);$numeroTemporal++){
	//$arregloFichas$[$filas][$columnas]=$arregloTemporal[$numeroTemporal];
	//echo($arregloFichas$[$filas][$columnas]);
	$arregloFilas[]=$arregloTemporal[$numeroTemporal];
	$columnas++;
	if($columnas>=$maximoColumnas){
		//$filas++;
		$columnas=0;
		foreach($arregloFilas as $dato){
		//	echo($dato." ");
		}
		//echo('<br>');
		$arregloFichas[]=$arregloFilas;
		$arregloFilas=array();
	}
	//echo('<br>'.$arregloTemporal[$numeroTemporal]);
}

foreach($arregloFichas as $datoFila){
	echo('<br>');
	foreach($datoFila as $dato){
		echo($dato." ");
	}
}

function Hijos($arregloFichas,$turno){
$hijos=0;
foreach($arregloFichas as $datoFila){
	echo('<br>');
        foreach($datoFila as $dato){
		echo('<br>Estoy en: '.$dato.' Comparado con: '.$turno);
		if($dato==$turno){
			$hijos++;
		}
        }
}
echo('Numero de hijos: '.$hijos);
}

Hijos($arregloFichas,$turno);

?>