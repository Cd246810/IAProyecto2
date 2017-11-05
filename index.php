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

function Hijos($arregloFichas,$turno,$nivel){
	$hijos=array();
	$filas=0;
	$columna=0;
	foreach($arregloFichas as $datoFila){
		//echo('<br>');
		$columna=0;
        foreach($datoFila as $dato){
			//echo('<br>Estoy en: '.$dato.' Comparado con: '.$turno);
			if($dato==$turno){
				if($fila>1){
					$nuevaFila=verticalArriba($arregloFichas,$turno,$fila-1,$columna);
					if($nuevaFila!=-1){
						//echo ('<br>Se puede a mover arriba a la posicion: '.$nuevaFila);
						$hijoTemporal=array();
						$hijoTemporal[]=llenarVerticalArriba($arregloFichas,$turno,$fila-1,$columna);
						$hijoTemporal[]=$nuevaFila;
						$hijoTemporal[]=$columna;
						$hijoTemporal[]=10;
						$hijoTemporal[]=$nivel+1;
						$hijos[]=$hijoTemporal;
					}

					//if($arregloFichas[$fila-1][$columna]!=2 && $arregloFichas[$fila-1][$columna]!=turno && $arregloFichas[$fila-2][$columna]==2){
					//	echo ('<br>Se puede mover a la arriba');
					//}
				}
				if ($fila<6){
					$nuevaFila=verticalAbajo($arregloFichas,$turno,$fila+1,$columna);
					if($nuevaFila!=-1){
						//echo ('<br>Se puede a mover abajo a la posicion: '.$nuevaFila);
						$hijoTemporal=array();
						$hijoTemporal[]=llenarVerticalAbajo($arregloFichas,$turno,$fila+1,$columna);
						$hijoTemporal[]=$nuevaFila;
						$hijoTemporal[]=$columna;
						$hijoTemporal[]=10;
						$hijoTemporal[]=$nivel+1;
						$hijos[]=$hijoTemporal;
					}
					//if($arregloFichas[$fila+1][$columna]!=2 && $arregloFichas[$fila+1][$columna]!=turno && $arregloFichas[$fila+2][$columna]==2){
					//	echo ('<br>Se puede mover a la abajo');
					//}
				}
				if($columna>1){
					$nuevaColumna=horizontalIzquierda($arregloFichas,$turno,$fila,$columna-1);
					if($nuevaColumna!=-1){
						//echo ('<br>Se puede a mover izquierda a la posicion: '.$nuevaColumna);
						$hijoTemporal=array();
						$hijoTemporal[]=llenarHorizontalIzquierda($arregloFichas,$turno,$fila,$columna-1);
						$hijoTemporal[]=$fila;
						$hijoTemporal[]=$nuevaColumna;
						$hijoTemporal[]=10;
						$hijoTemporal[]=$nivel+1;
						$hijos[]=$hijoTemporal;
					}
					//if($arregloFichas[$fila][$columna-1]!=2 && $arregloFichas[$fila][$columna-1]!=turno && $arregloFichas[$fila][$columna-2]==2){
					//	echo ('<br>Se puede mover izquierda');
					//}
				}
				if ($columna<6){
					$nuevaColumna=horizontalDerecha($arregloFichas,$turno,$fila,$columna+1);
					if($nuevaColumna!=-1){
						//echo ('<br>Se puede a mover derecha a la posicion: '.$nuevaColumna);
						$hijoTemporal=array();
						$hijoTemporal[]=llenarHorizontalDerecha($arregloFichas,$turno,$fila,$columna+1);
						$hijoTemporal[]=$fila;
						$hijoTemporal[]=$nuevaColumna;
						$hijoTemporal[]=10;
						$hijoTemporal[]=$nivel+1;
						$hijos[]=$hijoTemporal;
					}
					//if($arregloFichas[$fila][$columna+1]!=2 && $arregloFichas[$fila][$columna+1]!=turno && $arregloFichas[$fila][$columna+2]==2){
					//	echo ('<br>Se puede mover derecha');
					//}
				}
				if($fila>1 && $columna>1){
					$nuevaFila=diagonalArribaIzquierda($arregloFichas,$turno,$fila-1,$columna-1);
					if($nuevaFila!=-1){
						//echo ('<br>Posicion: '.$columna.' '.$fila.' Se puede a mover en diagonal arriba izquierda a la posicion: '.($columna+$nuevaFila-$fila).' '.$nuevaFila);
						$hijoTemporal=array();
						$hijoTemporal[]=llenarDiagonalArribaIzquierda($arregloFichas,$turno,$fila-1,$columna-1);
						$hijoTemporal[]=$columna+$nuevaFila-$fila;
						$hijoTemporal[]=$nuevaFila;
						$hijoTemporal[]=10;
						$hijoTemporal[]=$nivel+1;
						$hijos[]=$hijoTemporal;
					}
				}
				if($fila>1 && $columna<6){
					$nuevaFila=diagonalArribaDerecha($arregloFichas,$turno,$fila-1,$columna+1);
					if($nuevaFila!=-1){
						//echo ('<br>Posicion: '.$columna.' '.$fila.' Se puede a mover en diagonal arriba derecha a la posicion: '.($columna-$nuevaFila+$fila).' '.$nuevaFila);
						$hijoTemporal=array();
						$hijoTemporal[]=llenarDiagonalArribaDerecha($arregloFichas,$turno,$fila-1,$columna+1);
						$hijoTemporal[]=$columna-$nuevaFila+$fila;
						$hijoTemporal[]=$nuevaFila;
						$hijoTemporal[]=10;
						$hijoTemporal[]=$nivel+1;
						$hijos[]=$hijoTemporal;
					}
				}
				if($fila<6 && $columna>1){
					$nuevaFila=diagonalAbajoIzquierda($arregloFichas,$turno,$fila+1,$columna-1);
					if($nuevaFila!=-1){
						//echo ('<br>Posicion: '.$columna.' '.$fila.' Se puede a mover en diagonal abajo izquierda a la posicion: '.($columna-$nuevaFila+$fila).' '.$nuevaFila);
						$hijoTemporal=array();
						$hijoTemporal[]=llenarDiagonalAbajoIzquierda($arregloFichas,$turno,$fila+1,$columna-1);
						$hijoTemporal[]=$columna-$nuevaFila+$fila;
						$hijoTemporal[]=$nuevaFila;
						$hijoTemporal[]=10;
						$hijoTemporal[]=$nivel+1;
						$hijos[]=$hijoTemporal;
					}
				}
				if($fila<6 && $columna<6){
					$nuevaFila=diagonalAbajoDerecha($arregloFichas,$turno,$fila+1,$columna+1);
					if($nuevaFila!=-1){
						//echo ('<br>Posicion: '.$columna.' '.$fila.' Se puede a mover en diagonal abajo derecha a la posicion: '.($columna+$nuevaFila-$fila).' '.$nuevaFila);
						$hijoTemporal=array();
						$hijoTemporal[]=llenarDiagonalAbajoDerecha($arregloFichas,$turno,$fila+1,$columna+1);
						$hijoTemporal[]=$columna+$nuevaFila-$fila;
						$hijoTemporal[]=$nuevaFila;
						$hijoTemporal[]=10;
						$hijoTemporal[]=$nivel+1;
						$hijos[]=$hijoTemporal;
					}
				}
			}
			$columna++;
        }
        $fila++;
	}
	return $hijos;
	//echo('Numero de hijos: '.$hijos);
}

function verticalArriba($arregloFichas, $turno, $fila, $columna){
	if($arregloFichas[$fila][$columna]!=$turno && $arregloFichas[$fila][$columna]!=2){
		$fila--;
		while($fila>=0){
			if($arregloFichas[$fila][$columna]==$turno){
				return -1;
			}
			if($arregloFichas[$fila][$columna]==2){
				return $fila;
			}
			$fila--;
		}
	}
	return -1;
}

function llenarVerticalArriba($arregloFichas, $turno, $fila, $columna){
	$retorno=$arregloFichas;
	while($fila>=0){
		$retorno[$fila][$columna]=$turno;
		if($arregloFichas[$fila][$columna]==2){
			return $retorno;
		}
		$fila--;
	}
	return $retorno;
}

function verticalAbajo($arregloFichas, $turno, $fila, $columna){
	if($arregloFichas[$fila][$columna]!=$turno && $arregloFichas[$fila][$columna]!=2){
		$fila++;
		while($fila<8){
			if($arregloFichas[$fila][$columna]==$turno){
				return -1;
			}
			if($arregloFichas[$fila][$columna]==2){
				return $fila;
			}
			$fila++;
		}
	}
	return -1;
}
function llenarVerticalAbajo($arregloFichas, $turno, $fila, $columna){
	$retorno=$arregloFichas;
	while($fila<8){
		$retorno[$fila][$columna]=$turno;
		if($arregloFichas[$fila][$columna]==2){
			return $retorno;
		}
		$fila++;
	}
	return $retorno;
}

function horizontalDerecha($arregloFichas, $turno, $fila, $columna){
	if($arregloFichas[$fila][$columna]!=$turno && $arregloFichas[$fila][$columna]!=2){
		$columna++;
		while($columna<8){
			if($arregloFichas[$fila][$columna]==$turno){
				return -1;
			}
			if($arregloFichas[$fila][$columna]==2){
				return $columna;
			}
			$columna++;
		}
	}
	return -1;
}

function llenarHorizontalDerecha($arregloFichas, $turno, $fila, $columna){
	$retorno=$arregloFichas;
	while($columna<8){
		$retorno[$fila][$columna]=$turno;
		if($arregloFichas[$fila][$columna]==2){
			return $retorno;
		}
		$columna++;
	}
	return $retorno;
}

function horizontalIzquierda($arregloFichas, $turno, $fila, $columna){
	if($arregloFichas[$fila][$columna]!=$turno && $arregloFichas[$fila][$columna]!=2){
		$columna--;
		while($columna>=0){
			if($arregloFichas[$fila][$columna]==$turno){
				return -1;
			}
			if($arregloFichas[$fila][$columna]==2){
				return $columna;
			}
			$columna--;
		}
	}
	return -1;
}

function llenarHorizontalIzquierda($arregloFichas, $turno, $fila, $columna){
	$retorno=$arregloFichas;
	while($columna>=0){
		$retorno[$fila][$columna]=$turno;
		if($arregloFichas[$fila][$columna]==2){
			return $retorno;
		}
		$columna--;
	}
	return $retorno;
}

function diagonalArribaIzquierda($arregloFichas, $turno, $fila, $columna){
	if($arregloFichas[$fila][$columna]!=$turno && $arregloFichas[$fila][$columna]!=2){
		$fila--;
		$columna--;
		while($fila>=0 && $columna>=0){
			if($arregloFichas[$fila][$columna]==$turno){
				return -1;
			}
			if($arregloFichas[$fila][$columna]==2){
				return $fila;
			}
			$fila--;
			$columna--;
		}
	}
	return -1;
}//por op aritmetica sacar la columna columna tambien;

function llenarDiagonalArribaIzquierda($arregloFichas, $turno, $fila, $columna){
	$retorno=$arregloFichas;
	while($fila>=0 && $columna>=0){
		$retorno[$fila][$columna]=$turno;
		if($arregloFichas[$fila][$columna]==2){
			return $retorno;
		}
		$fila--;
		$columna--;
	}
	return $retorno;
}

function diagonalArribaDerecha($arregloFichas, $turno, $fila, $columna){
	if($arregloFichas[$fila][$columna]!=$turno && $arregloFichas[$fila][$columna]!=2){
		$fila--;
		$columna++;
		while($fila>=0 && $columna<8){
			if($arregloFichas[$fila][$columna]==$turno){
				return -1;
			}
			if($arregloFichas[$fila][$columna]==2){
				return $fila;
			}
			$fila--;
			$columna++;
		}
	}
	return -1;
}//por op aritmetica sacar la columna columna tambien;

function llenarDiagonalArribaDerecha($arregloFichas, $turno, $fila, $columna){
	$retorno=$arregloFichas;
	while($fila>=0 && $columna<8){
		$retorno[$fila][$columna]=$turno;
		if($arregloFichas[$fila][$columna]==2){
			return $retorno;
		}
		$fila--;
		$columna++;
	}
	return $retorno;
}

function diagonalAbajoIzquierda($arregloFichas, $turno, $fila, $columna){
	if($arregloFichas[$fila][$columna]!=$turno && $arregloFichas[$fila][$columna]!=2){
		$fila++;
		$columna--;
		while($fila<8 && $columna>=0){
			if($arregloFichas[$fila][$columna]==$turno){
				return -1;
			}
			if($arregloFichas[$fila][$columna]==2){
				return $fila;
			}
			$fila++;
			$columna--;
		}
	}
	return -1;
}//por op aritmetica sacar la columna columna tambien;

function llenarDiagonalAbajoIzquierda($arregloFichas, $turno, $fila, $columna){
	$retorno=$arregloFichas;
	while($fila<8 && $columna>=0){
		$retorno[$fila][$columna]=$turno;
		if($arregloFichas[$fila][$columna]==2){
			return $retorno;
		}
		$fila++;
		$columna--;
	}
	return $retorno;
}

function diagonalAbajoDerecha($arregloFichas, $turno, $fila, $columna){
	if($arregloFichas[$fila][$columna]!=$turno && $arregloFichas[$fila][$columna]!=2){
		$fila++;
		$columna++;
		while($fila<8 && $columna<8){
			if($arregloFichas[$fila][$columna]==$turno){
				return -1;
			}
			if($arregloFichas[$fila][$columna]==2){
				return $fila;
			}
			$fila++;
			$columna++;
		}
	}
	return -1;
}//por op aritmetica sacar la columna columna tambien;

function llenarDiagonalAbajoDerecha($arregloFichas, $turno, $fila, $columna){
	$retorno=$arregloFichas;
	while($fila<8 && $columna<8){
		$retorno[$fila][$columna]=$turno;
		if($arregloFichas[$fila][$columna]==2){
			return $retorno;
		}
		$fila++;
		$columna++;
	}
	return $retorno;
}

function backtracking($raiz,$turno){
	$nivel=0;
	$lista=array();
	$visitado=array();
	$inicio=array();
	$inicio[]=$raiz;
	$inicio[]=0;
	$inicio[]=0;
	$inicio[]=0;
	$inicio[]=0;
	$lista[]=$inicio;
	while($lista){
		$nodoActual=array_shift($lista);
		$visitado[]=$nodoActual;
		if($nodoActual[4]<3){
			$hijos=array();
			$hijos=Hijos($nodoActual[0],$turno,$nodoActual[4]);
			foreach ($hijos as $hijo) {
				array_push($lista, $hijo);
			}
		}
	}
	foreach ($visitado as $hijo) {
		echo('<br>');
		echo('<br>');
		echo ('Posicion a la que se movio: '.$hijo[1].' - '.$hijo[2].' Con ponderacion= '.$hijo[3].' y nivel: '.$hijo[4]);
		foreach($hijo[0] as $datoFila){
			echo('<br>');
			foreach($datoFila as $dato){
				echo($dato." ");
			}
		}
	}
}
backtracking($arregloFichas,$turno);
//$Sucesores=Hijos($arregloFichas,$turno,0);
/*
foreach ($Sucesores as $hijo) {
	echo('<br>');
	echo('<br>');
	echo ('Posicion a la que se movio: '.$hijo[1].' - '.$hijo[2].' Con ponderacion= '.$hijo[3].' y nivel: '.$hijo[4]);
	foreach($hijo[0] as $datoFila){
		echo('<br>');
		foreach($datoFila as $dato){
			echo($dato." ");
		}
	}
}
*/

?>