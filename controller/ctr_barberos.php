<?php 

include('../conexion/conexion.php');


if(isset($_POST['accion'])){

	$accion=$_POST['accion'];

}else{

	$accion='cargarbarberos';

}



switch($accion){
	case "cargarbarberos":
	if(isset($_POST['limite'])){
	    
	    $limiteNumero = $_POST['limite']; 
	    if( $limiteNumero==0 ){
	        $limite = 0;    
	    }else{
	        $limite = $limiteNumero;
	    }
	    
	}else{
	    $limite = 0;
	}    
	
	$q = "SELECT COUNT(usu_rol) AS total FROM usuarios WHERE usu_rol='Barbero' AND usu_estado='1'";
	$r = mysqli_query($conexion,$q);
	$dataBarberosBD = mysqli_fetch_assoc($r);
	$cantidadBarberosBD = $dataBarberosBD['total'];

    if($cantidadBarberosBD > $limite){
    	$query = "SELECT * FROM usuarios WHERE usu_estado='1' AND usu_rol='Barbero' ORDER BY usu_id DESC LIMIT 15 OFFSET $limite";
    	$resp=mysqli_query($conexion,$query);
    	if(!$resp){
    		$informacion["respuesta"] = "ERROR";
    		$informacion["descripcionError"] = "ERROR SERVIDOR AL TRATAR DE HACER LA CONSULTA";
    		$informacion["data"] = null;
    		
    	}else{
    	        $barberos = [];
    			while ($fila = mysqli_fetch_assoc($resp)) {
    				$barberos[] = $fila;
    			}
    		
    			$informacion["respuesta"] = "BIEN";
    			$informacion["descripcionError"] = null;
    			$informacion["data"] = $barberos;
    			$informacion["cantidadbarberosbd"] = $cantidadBarberosBD;
    			
    
    		
    	}
    }else{
        	$informacion["respuesta"] = "BIEN";
			$informacion["descripcionError"] = null;
			$informacion["data"] = [];
			$informacion["cantidadbarberosbd"] = $cantidadBarberosBD;
	
    }
	echo json_encode($informacion);
	break;	

    case "getAllInformacionBarbero":
        $id = $_POST['id'];
        $query = "SELECT * FROM usuarios INNER JOIN trabajos ON(tra_usu_id = usu_id) INNER JOIN fotos ON(fot_tra_id = tra_id) WHERE usu_id='$id'";
    	$resp = mysqli_query($conexion,$query);
    	if(!resp){
    	    	$informacion["respuesta"] = "ERROR";
    			$informacion["descripcionError"] = "ERROR AL TRATAR DE HACER LA CONSULTA DE BARBERO";
    			$informacion["data"] = null;
    			
    	}else{
    	        $data = [];
    	        $fotos = [];
    	        while($fila = mysqli_fetch_assoc($resp)){
    	            
    	            array_push( $fotos, $fila["fot_foto"] );
    	             $data = $fila;
    	        }
    	       
    	        
    	        if($data == null || $data==''){
    	            $q = "SELECT * FROM usuarios WHERE usu_id='$id'";
    	            $r = mysqli_query($conexion,$q);
    	            $datos = mysqli_fetch_assoc($r);
    	            
    	            $informacion["respuesta"] = "BIEN";
        			$informacion["descripcionError"] = null;
        			$informacion["data"] = $datos;
        			$informacion["fotos"] = [];
    	        }else{
    	            $informacion["respuesta"] = "BIEN";
        			$informacion["descripcionError"] = null;
        			$informacion["data"] = $data;
        			$informacion["fotos"] = $fotos;
    	        }
    	        
    		
    	}	
    	echo json_encode($informacion);
        
    break;        

	case "savePuntuacionBarbero":
		$idBarbero = $_POST["idBarbero"];
		$idUsuario = $_POST["idUsuario"];
		$calificacion = $_POST["calificacion"];
		$banderayavote = $_POST["banderayavote"];

		if( $banderayavote=="yavoto" ){
			$comentario = $_POST["comentario"];
			$sql = "UPDATE calificacion SET cal_calificacion='$calificacion', cal_comentario='$comentario' WHERE cal_usu_id='$idBarbero' AND cal_usu_cliente='$idUsuario'";
		}
		else{
			if( isset($_POST["comentario"]) ){
				$comentario = $_POST["comentario"];
				$sql = "INSERT INTO calificacion(cal_usu_id, cal_usu_cliente, cal_calificacion, cal_comentario) VALUES('$idBarbero','$idUsuario', '$calificacion', '$comentario')";
			}
			else {
				$sql = "INSERT INTO calificacion(cal_usu_id, cal_usu_cliente,cal_calificacion) VALUES('$idBarbero','$idUsuario','$calificacion')";
			}
		}

		$r = mysqli_query($conexion, $sql);
		if( !$r ){
			$informacion["respuesta"] = "ERROR";
    		$informacion["descripcionError"] = "ERROR SERVIDOR AL TRATAR DE HACER INSERT";
    		$informacion["data"] = null;
		}else{
			//obtenemos el nuevo promedio de la calificacion
			$q = "SELECT AVG(cal_calificacion) as promedio FROM calificacion WHERE cal_usu_id='$idBarbero'";
			$re = mysqli_query($conexion, $q);
			$data = mysqli_fetch_assoc($re);
			$promedio = $data["promedio"];
			//actualizamos la calificacion del barbero
			$que = "UPDATE usuarios SET usu_barberoPuntaje='$promedio' WHERE usu_id='$idBarbero'";
			$respuesta = mysqli_query($conexion, $que);
			if( !$respuesta ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR AL TRATAR DE HACER INSERT";
				$informacion["data"] = null;

			}
			else{
				$informacion["respuesta"] = "BIEN";
				$informacion["promedio"] = round($promedio);
				$informacion["descripcionError"] = null;
				$informacion["data"] = null;
			}
		} 

		echo json_encode($informacion);

		break;

		case "addToFavorite":
			$idUsuario = $_POST["idUsuario"];
			$idBarbero = $_POST["idBarbero"];
			$q = "INSERT INTO favoritos(fav_usu_usuario, fav_usu_barbero) VALUES('$idUsuario', '$idBarbero')";
			$r = mysqli_query($conexion, $q);
			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR AL TRATAR DE HACER INSERT";
				$informacion["data"] = null;
			}else{
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = null;
			}
		echo json_encode($informacion);
		break;

		case "getMyFavorite":
			$idUsuario = $_POST["idUsuario"];
			$idBarbero = $_POST["idBarbero"];
			$q = "SELECT * FROM favoritos WHERE fav_usu_usuario='$idUsuario' AND fav_usu_barbero='$idBarbero'";
			$r = mysqli_query($conexion, $q);

			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR AL TRATAR CONSULTAR";
				$informacion["data"] = null;
			}else{
				$numberFiles = mysqli_num_rows($r);
				if( $numberFiles ){
					$informacion["esFavorito"] = true;
				} else{
					$informacion["esFavorito"] = false;
				}
				
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = null;
			}
		echo json_encode($informacion);


		break;

		case "removeFromFavorite":
			$idUsuario = $_POST["idUsuario"];
			$idBarbero = $_POST["idBarbero"];
			$q = "DELETE FROM favoritos WHERE fav_usu_usuario='$idUsuario' AND fav_usu_barbero='$idBarbero'";
			$r = mysqli_query($conexion, $q);
			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR";
				$informacion["data"] = null;
			}else{
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = null;
			}
			echo json_encode($informacion);
		break;

		case "getAllMyFavorites":
			$id = $_POST["id"];
			$q = "SELECT * FROM favoritos INNER JOIN usuarios ON(fav_usu_barbero=usu_id) WHERE fav_usu_usuario='$id'";
			$r = mysqli_query($conexion, $q);
			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR";
				$informacion["data"] = null;
			}else{
				$data = [];
				while($fila = mysqli_fetch_assoc($r)){
					$data[] = $fila;
				}

				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $data;
			}
			echo json_encode($informacion);
			
		break;

		case "getTopBarberos":
			$q = "SELECT * FROM usuarios WHERE usu_estado='1' AND usu_rol='Barbero' ORDER BY usu_barberoPuntaje DESC LIMIT 5";
			$r = mysqli_query($conexion, $q);
			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR";
				$informacion["data"] = null;
			}else{
				$data = [];
				while($fila = mysqli_fetch_assoc($r)){
					$data[] = $fila;
				}

				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $data;
			}
			echo json_encode($informacion);
			
		break;

		case "buscador":
			$buscar = $_POST["buscar"];
			$q = "SELECT * FROM usuarios WHERE usu_rol='Barbero' AND usu_estado='1' AND usu_nombre LIKE '%$buscar%' LIMIT 4";
			$r = mysqli_query($conexion, $q);
			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR";
				$informacion["data"] = null;
			}else{
				$data = [];
				while($fila = mysqli_fetch_assoc($r)){
					$data[] = $fila;
				}

				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $data;
			}
			echo json_encode($informacion);
			
		break;

		case "pedircita":
			$nombre = $_POST["nombre"];
			$hora = $_POST["hora"];
			$telefono = $_POST["telefono"];
			$mensaje = $_POST["mensaje"];
			$idUsuario = $_POST["idusuario"];
			$idBarbero = $_POST["idbarbero"];
			if($mensaje=="null"){
				$mensaje=Null;
			}

			$q = "INSERT INTO citas(cit_usu_barbero, cit_usu_usuario, cit_nombre, cit_hora, cit_telefono, cit_mensaje, cit_estado) VALUES('$idBarbero', '$idUsuario', '$nombre', '$hora', '$telefono', '$mensaje', 'Abierta')";

			$r = mysqli_query($conexion, $q);

			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR";
				$informacion["data"] = null;
			}else{
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $data;
			}

			echo json_encode($informacion);

		break;


		case "listarmiscitas":
			$id = $_POST["usuarioLogueado"];
			$q = "SELECT * FROM citas INNER JOIN usuarios ON(cit_usu_usuario=usu_id) WHERE cit_usu_barbero='$id' AND cit_estado='Abierta'";
			$r = mysqli_query($conexion, $q);
			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR";
				$informacion["data"] = null;
			}else{
				$data = [];
				while($fila = mysqli_fetch_assoc($r)){
					$data[] = $fila;
				}

				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $data;
			}
			echo json_encode($informacion);
			
		break;


		case "datoscita":
			$id = $_POST["id"];
			$q = "SELECT * FROM citas WHERE cit_id='$id' AND cit_estado='Abierta'";
			$r = mysqli_query($conexion, $q);
			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR";
				$informacion["data"] = null;
			}else{
				$data = mysqli_fetch_assoc($r);

				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $data;
			}
			echo json_encode($informacion);
			
		break;

		case "cerrarcita":
			$id = $_POST["id"];
			$q = "UPDATE citas SET cit_estado='Cerrada' WHERE cit_id='$id'";
			$r = mysqli_query($conexion, $q);
			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR";
				$informacion["data"] = null;
			}else{
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = null;
			}
			echo json_encode($informacion);
			
		break;


		case "sabersiyadipuntuacion":
			$idUsuario = $_POST["idUsuario"];
			$idBarbero = $_POST["idBarbero"];
			$q = "SELECT * FROM calificacion WHERE cal_usu_id='$idBarbero' AND cal_usu_cliente='$idUsuario'";
			$r = mysqli_query($conexion, $q);

			if( !$r ){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR SERVIDOR";
				$informacion["data"] = null;
			}else{
				$numberFiles = mysqli_num_rows($r);
				if( $numberFiles ){
					$informacion["banderavoto"] = "yavoto";
					$data = mysqli_fetch_assoc($r);
				} else{
					$informacion["banderavoto"] = "novoto";
					$data = [];
				}
				
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $data;
				
			}
		echo json_encode($informacion);








}//fin del switch



?>