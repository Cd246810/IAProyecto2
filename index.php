<?php
$arregloTemporal = str_split(htmlspecialchars($_GET["estado"]) );
echo 'Turno de ' . htmlspecialchars($_GET["turno"]) . ' con los valores: '.htmlspecialchars($_GET["estado"]).'!';
echo('<br>');
$turno=htmlspecialchars($_GET["turno"]);
echo('turno:'.$turno.'<br>');
$filas=0;
$columna=0;
$maximoFilas=8;
$maximoColumnas=8;
$arregloFilas=array();
$arregloFichas=array();


for($numeroTemporal=0;$numeroTemporal<count($arregloTemporal);$numeroTemporal++){
	//$arregloFichas$[$filas][$columna]=$arregloTemporal[$numeroTemporal];
	//echo($arregloFichas$[$filas][$columna]);
	$arregloFilas[]=$arregloTemporal[$numeroTemporal];
	$columna++;
	if($columna>=$maximoColumnas){
		//$filas++;
		$columna=0;
		//foreach($arregloFilas as $dato){
		//	echo($dato." ");
		//}
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
	$filas=0;
	$columna=0;
	foreach($arregloFichas as $datoFila){
		//echo('<br>');
		$columna=0;
        foreach($datoFila as $dato){
			//echo('<br>Estoy en: '.$dato.' Comparado con: '.$turno);
			if($dato==$turno){
				if($fila>1){
					if($arregloFichas[$fila-1][$columna]!=2 && $arregloFichas[$fila-1][$columna]!=turno && $arregloFichas[$fila-2][$columna]==2){
						echo ('<br>Se puede mover a la izquierda');
					}
				}
				if ($fila<6){
					if($arregloFichas[$fila+1][$columna]!=2 && $arregloFichas[$fila+1][$columna]!=turno && $arregloFichas[$fila+2][$columna]==2){
						echo ('<br>Se puede mover a la derecha');
					}
				}
				if($columna>1){
					if($arregloFichas[$fila][$columna-1]!=2 && $arregloFichas[$fila][$columna-1]!=turno && $arregloFichas[$fila][$columna-2]==2){
						echo ('<br>Se puede mover arriba');
					}
				}
				if ($columna<6){
					if($arregloFichas[$fila][$columna+1]!=2 && $arregloFichas[$fila][$columna+1]!=turno && $arregloFichas[$fila][$columna+2]==2){
						echo ('<br>Se puede mover abajo');
					}
				}
				$hijos++;
			}
			$columna++;
        }
        $fila++;
	}
	//echo('Numero de hijos: '.$hijos);
}

Hijos($arregloFichas,$turno);

?>