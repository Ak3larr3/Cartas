<!DOCTYPE html>
 <html lang="es">

<?php 
	require './funciones/funciones.php';
?>
<head>
 	<meta charset="UTF-8">
 	<title>Juego de Cartas</title>
 	<link href="css/estilo.css" rel="stylesheet"> 
 </head>
<body>

<section>
	
<?php
	
	if(isset($_POST['seleccion']) == 0){
		$baraja = generar_juego();		
		echo mostrarBaraja($baraja);
	}else{		
		$baraja['cartas']= explode(',', $_POST['cartas']);
		$baraja['descubiertas']= explode(',', $_POST['descubiertas']);
		$baraja['primera']=$_POST['primera'];
		$baraja['segunda']=$_POST['segunda'];
		$baraja['contador']=$_POST['contador'];
		$baraja['fallo']=$_POST['fallo'];
		$seleccion=$_POST['seleccion'];

		if($baraja['fallo']){
			$baraja= cubrir($baraja,$baraja['primera']);
			$baraja= cubrir($baraja,$baraja['segunda']);
			$baraja['primera']=-1;
			$baraja['segunda']=-1;
			$baraja['contador']++;
			$baraja['fallo']=FALSE;			
		}

		if($baraja['primera']==-1){
			if(!estaDescubierta($baraja, $seleccion) || $seleccion==$baraja['primera'] || $seleccion==$baraja['segunda']){
				$baraja['primera']=$seleccion;
				$baraja=descubrir($baraja, $seleccion);
				echo mostrarBaraja($baraja);
			}else{
				echo mostrarBaraja($baraja);
			}

		}else{			
			if($baraja['cartas'][$baraja['primera']]==$baraja['cartas'][$seleccion]){
				
					$baraja=descubrir($baraja, $seleccion);
					$baraja['primera']=-1;
					$baraja['segunda']=-1;		
					echo mostrarBaraja($baraja);
				
			}else{
				
					$baraja=descubrir($baraja,$seleccion);
					$baraja['segunda']=$seleccion;
					$baraja['fallo']=TRUE;			
					echo mostrarBaraja($baraja);
				
			}
		}	
			
	}
 ?>
	
 	
 	<div id="contador_fallos">
 		<?php echo $baraja['contador']; ?>
 	</div>
 	<div id="fin_juego"></div>
 	<!--
 	<form id="formreset" action="index.php" method="post">
 		<button id="reset" type="submit">Reset</button>
 	</form>
 	-->
 	</section>
 	
 </body>
 </html>