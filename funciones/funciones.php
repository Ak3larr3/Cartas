<?php 
	function generar_juego(){
		$cartas = array(1,1,2,2,3,3,4,4,5,5,6,6,7,7);
		$descubiertas = array(FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE);
		shuffle($cartas);
		$retorno = array('cartas'=>$cartas,'descubiertas'=>$descubiertas,'contador'=>0,'primera'=>-1,'segunda'=>-1,'fallo'=>FALSE);
		return $retorno;
	}

	function mostrarBaraja($baraja){
		$retorno = "<form method=\"post\" action=\"./index.php\">";		

		for($i=0;$i<count($baraja['cartas']);$i++){

			if($baraja['descubiertas'][$i]){

				$retorno.= "<button type=\"submit\" name=\"seleccion\" value=\"".$i."\"><img src=\"./imagenes/".$baraja['cartas'][$i].".jpg\" /></button>";
			}else{
				$retorno.= "<button type=\"submit\" name=\"seleccion\" value=\"".$i."\"><img src=\"./imagenes/8.jpg\" /></button>";
			}			
		}
		$cartas = implode(',', $baraja['cartas']);
		$descubiertas = implode(',', $baraja['descubiertas']);		
		$retorno.="<input type=\"hidden\" name=\"cartas\" value=\"".$cartas."\" >";
		$retorno.="<input type=\"hidden\" name=\"descubiertas\" value=\"".$descubiertas."\" >";
		$retorno.="<input type=\"hidden\" name=\"contador\" value=\"".$baraja['contador']."\" >";	
		$retorno.="<input type=\"hidden\" name=\"primera\" value=\"".$baraja['primera']."\" >";
		$retorno.="<input type=\"hidden\" name=\"segunda\" value=\"".$baraja['segunda']."\" >";
		$retorno.="<input type=\"hidden\" name=\"fallo\" value=\"".$baraja['fallo']."\" >";		
		$retorno.="</form>";
		return $retorno;
	}


	function descubrir($baraja, $posicion){
		if(!$baraja['descubiertas'][$posicion])
			$baraja['descubiertas'][$posicion]=TRUE;
		return $baraja;
	}
	function cubrir($baraja, $posicion){
		if($baraja['descubiertas'][$posicion])
			$baraja['descubiertas'][$posicion]=FALSE;
		return $baraja;
	}

	function estaDescubierta($baraja, $posicion){
		if($baraja['descubiertas'][$posicion])
			return TRUE;
		else
			return FALSE;
	}







 ?>
