<?php 

include('../conexion/conexion.php');
include('verificador.php');



// if($conexion)

// 	die("hay conexion");



if(isset($_POST['accion'])){

	$accion=$_POST['accion'];

}else{

	$accion=1;

}



switch($accion){
	case "login":
	$pass = $_POST["pass"];
	$correo = $_POST["correo"];
	$obj = new Pass_crypt();
	$query="SELECT * FROM usuarios WHERE usu_correo='$correo'";
	$resp=mysqli_query($conexion,$query);
	if(!$resp){
		$informacion["respuesta"] = "ERROR";
		$informacion["descripcionError"] = "ERROR SERVIDOR AL TRATAR DE HACER LA CONSULTA";
		$informacion["data"] = null;
	}else{
		$data = mysqli_fetch_assoc($resp);
		$passbd = $data["usu_password"];
		$validador = $obj->check_value($pass,$passbd);
		if($validador){
			$informacion["respuesta"] = "BIEN";
			$informacion["descripcionError"] = null;
			$informacion["data"] = $data;
		}else{
			$informacion["respuesta"] = "CREDENCIALESERRORNEAS";
			$informacion["descripcionError"] = "LAS CREDENCIALES INGRESADAS SON ERRONEAS";
			$informacion["data"] = null;
		}
	}
	echo json_encode($informacion);
	break;	

	case "registrar":
		$pass = $_POST["pass"];
		$correo = $_POST["correo"];
		$obj = new Pass_crypt();

		$query="SELECT * FROM usuarios WHERE usu_correo='$correo'";
		$resp=mysqli_query($conexion,$query);
		if(!$resp){
			$informacion["respuesta"] = "ERROR";
			$informacion["descripcionError"] = "ERROR SERVIDOR AL TRATAR DE HACER LA CONSULTA";
			$informacion["data"] = null;
		}else{
			$numeroFilas = mysqli_num_rows($resp);
			if($numeroFilas>0){
				$informacion["respuesta"] = "CORREOYAEXISTE";
				$informacion["descripcionError"] = "EL CORREO INGRESADO YA ESTA REGISTRADO EN NUESTRO SISTEMA";
				$informacion["data"] = null;
			}
			else{
				$newpassword = $obj->create_hash($pass);
				$q = "INSERT INTO usuarios(usu_estado, usu_rol, usu_nombre, usu_telefono, usu_correo, usu_direccion, usu_password) VALUES('1', 'Usuario', 'Usuario', '0000000000', '$correo', 'Direcci贸n', '$newpassword')";
				$r = mysqli_query($conexion, $q);
				if(!$r){
					$informacion["respuesta"] = "ERROR";
					$informacion["descripcionError"] = "ERROR DEL SERVIDOR AL TRATAR DE HACER EL INSERT";
					$informacion["data"] = null;
				}
				else{
					$ultimoId = $conexion->insert_id;
					$qu="SELECT * FROM usuarios WHERE usu_id='$ultimoId'";
					$respu=mysqli_query($conexion,$qu);
					if(!$respu){
						$informacion["respuesta"] = "ERROR";
						$informacion["descripcionError"] = "ERROR DEL SERVIDOR AL TRATAR DE HACER EL SELECT DEL ULTIMO ID INGRESADO";
						$informacion["data"] = null;
					}else{
						$data = mysqli_fetch_assoc($respu);
						$informacion["respuesta"] = "BIEN";
						$informacion["descripcionError"] = null;
						$informacion["data"] = $data;
					}


				}
			}
		}

		echo json_encode($informacion);
	break;

	case "subiravatar":
		$idUsuario = $_POST['idusuario'];
		$img_path = '../avatars/' . $_FILES['photo']['name'];

		if(move_uploaded_file($_FILES['photo']['tmp_name'], $img_path)){
			$rutaCompleta = "http://syscalad.com/apichema/avatars/".$_FILES['photo']['name'];
			$sql = "UPDATE usuarios SET usu_foto = '$rutaCompleta' WHERE usu_id='$idUsuario'";
			$r = mysqli_query($conexion, $sql);

			if(!$r){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR DEL SERVIDOR AL TRATAR DE HACER EL UPDATE DEL AVATAR";
				$informacion["data"] = null;
			}else{
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $rutaCompleta;
			}
		}else{
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR AL TRATAR DE MOVER LA IMAGEN";
				$informacion["data"] = null;
		}
		
		echo json_encode($informacion);
	break;

	case "cambiarnombre":
		$id = $_POST["id"];
		$nombre = $_POST["nombre"];

		$q = "UPDATE usuarios SET usu_nombre='$nombre' WHERE usu_id='$id'";
		$r = mysqli_query($conexion, $q);
		if(!$r){
			$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR DEL SERVIDOR AL TRATAR DE HACER EL UPDATE DEL NOMBRE";
				$informacion["data"] = null;
		}else{
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $nombre;
		}

		echo json_encode($informacion);
	break;

	case "cambiartelefono":
		$id = $_POST["id"];
		$telefono = $_POST["telefono"];

		$q = "UPDATE usuarios SET usu_telefono='$telefono' WHERE usu_id='$id'";
		$r = mysqli_query($conexion, $q);
		if(!$r){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR DEL SERVIDOR AL TRATAR DE HACER EL UPDATE DEL NOMBRE";
				$informacion["data"] = null;
		}else{
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $telefono;
		}

		echo json_encode($informacion);
	break;

	case "cambiardireccion":
		$id = $_POST["id"];
		$direccion = $_POST["direccion"];

		$q = "UPDATE usuarios SET usu_direccion='$direccion' WHERE usu_id='$id'";
		$r = mysqli_query($conexion, $q);
		if(!$r){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR DEL SERVIDOR AL TRATAR DE HACER EL UPDATE DEL NOMBRE";
				$informacion["data"] = null;
		}else{
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $direccion;
		}

		echo json_encode($informacion);
	break;
	
	case "cambiardescripcionbarbero":
		$id = $_POST["id"];
		$descripcion = $_POST["descripcion"];

		$q = "UPDATE usuarios SET usu_barberoDescripcion='$descripcion' WHERE usu_id='$id'";
		$r = mysqli_query($conexion, $q);
		if(!$r){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR DEL SERVIDOR AL TRATAR DE HACER EL UPDATE DESCRIPCION BARBERO";
				$informacion["data"] = null;
		}else{
				$informacion["respuesta"] = "BIEN";
				$informacion["descripcionError"] = null;
				$informacion["data"] = $descripcion;
		}

		echo json_encode($informacion);
	break;

	case "cambiarpassword":
		$id = $_POST["id"];
		$old = $_POST["old"];
		$pass = $_POST["pass"];
		$obj = new Pass_crypt();
		$query="SELECT * FROM usuarios WHERE usu_id='$id'";
		$resp=mysqli_query($conexion,$query);
		if(!$resp){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR DEL SERVIDOR AL TRATAR DE CONSULTAR";
				$informacion["data"] = null;
		}else{
			$data = mysqli_fetch_assoc($resp);
			$passbd = $data["usu_password"];
			$validador = $obj->check_value($old,$passbd);
			if($validador){
				$newpassword = $obj->create_hash($pass);
				$q = "UPDATE usuarios SET usu_password='$newpassword' WHERE usu_id = '$id'";
				$r = mysqli_query($conexion, $q);
				if(!$r){
					$informacion["respuesta"] = "ERROR";
					$informacion["descripcionError"] = "ERROR AL TRATAR DE ACTUALIZAR LA CONTRASE脩A";
					$informacion["data"] = null;
				}else{
					$informacion["respuesta"] = "BIEN";
					$informacion["descripcionError"] = null;
					$informacion["data"] = null;
				}
			}else{
				$informacion["respuesta"] = "ERRORPASSWORDNOCOINCIDE";
				$informacion["descripcionError"] = "ERROR LA CONTRASE脩A NO COINCIDE";
				$informacion["data"] = null;
			}

			
		}
		echo json_encode($informacion);
	break;

	case "datosusuariologueado":
		$id = $_POST["id"];
		$query="SELECT * FROM usuarios WHERE usu_id='$id'";
		$resp=mysqli_query($conexion,$query);
		if(!$resp){
			$informacion["respuesta"] = "ERROR";
			$informacion["descripcionError"] = "ERROR SERVIDOR AL TRATAR DE HACER LA CONSULTA";
			$informacion["data"] = null;
		}else{
			$data = mysqli_fetch_assoc($resp);
			$informacion["respuesta"] = "BIEN";
			$informacion["descripcionError"] = null;
			$informacion["data"] = $data;
		}
		echo json_encode($informacion);
	break;

	case "addTrabajoBarbero": //para añadir fotos de sus trabajos
		$idUsuario = $_POST["idusuario"];
		$descripcion = $_POST["descripcion"];
		$cantidadFotos = $_POST["cantidadfotos"];


		$q = "INSERT INTO trabajos(tra_usu_id, tra_descripcion) VALUES('$idUsuario', '$descripcion')";

		$r = mysqli_query($conexion, $q);
		if(!$r){
			$informacion["respuesta"] = "ERROR";
			$informacion["descripcionError"] = "error al tratar de hacer el insert del trabajo";
			$informacion["data"] =null;
		}else{
			$ultimoId = $conexion->insert_id;
			for($i = 0; $i < $cantidadFotos; $i++){
				$fotoactual = 'photo'.$i;
				$rutaAmoverFoto = '../fotos/' . $idUsuario;
				if(!file_exists($rutaAmoverFoto)){
			        mkdir($rutaAmoverFoto, 0755,true) or die("No se puede crear el directorio");  
		        }
				
				$img_path = '../fotos/'.$idUsuario.'/'. $_FILES[$fotoactual]['name'];
				$nombreFoto = $_FILES[$fotoactual]['name'];

				if(move_uploaded_file($_FILES[$fotoactual]['tmp_name'], $img_path)){
					$rutaCompleta = "http://syscalad.com/apichema/fotos/".$idUsuario."/".$_FILES[$fotoactual]['name'];
					$sql = "INSERT INTO fotos(fot_tra_id, fot_foto, fot_nombre) VALUES('$ultimoId', '$rutaCompleta', '$nombreFoto')";
					$r1 = mysqli_query($conexion, $sql);
		
					if(!$r1){
						$informacion["respuesta"] = "ERROR";
						$informacion["descripcionError"] = "ERROR DEL SERVIDOR AL TRATAR DE HACER EL INSERT DE LA FOTO DE LA BARBERIA";
						$informacion["data"] = null;
					}else{
						$informacion["respuesta"] = "BIEN";
						$informacion["descripcionError"] = null;
						$informacion["data"] = "FOTOS SUBIDAS CORRECTAMENTE";
					}
						
				}else{
						$informacion["respuesta"] = "ERROR";
						$informacion["descripcionError"] = "ERROR AL TRATAR DE MOVER LA IMAGEN";
						$informacion["data"] = $fotoactual;
				}
			}
			
		}
		echo json_encode($informacion);
	break;
















}//fin del switch



?>