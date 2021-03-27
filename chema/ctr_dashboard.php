<?php 

include('../conexion/conexion.php');
include('../controller/verificador.php');



// if($conexion)

// 	die("hay conexion");



if(isset($_POST['accion'])){

	$accion=$_POST['accion'];

}else{

	$accion=1;

}



switch($accion){
    case "listarusuarios":
	$query="SELECT * FROM usuarios";
	$resp=mysqli_query($conexion,$query);
	if(!$resp){
		$informacion["respuesta"] = "ERROR";
		$informacion["descripcionError"] = "ERROR SERVIDOR AL TRATAR DE HACER LA CONSULTA";
      
	}else{
        
        $data = [];

        while($fila = mysqli_fetch_assoc($resp)){
			if($fila['usu_estado']==1){
				$fila['estado']='<span class="label label-info">Activo</span>';
			}else{
				$fila['estado']='<span class="label label-danger">Inactivo</span>';
			}
            $data["data"][] = $fila;
        }

    }
	echo json_encode($data);
	break;	

    case "cambiarpassword":
        $id = $_POST["iduserchangepassword"];
		$pass = $_POST["passchange1"];

		$obj = new Pass_crypt();
		$query="SELECT * FROM usuarios WHERE usu_id='$id'";
        $resp=mysqli_query($conexion,$query);
        
		if(!$resp){
				$informacion["respuesta"] = "ERROR";
				$informacion["descripcionError"] = "ERROR DEL SERVIDOR AL TRATAR DE CONSULTAR";
				$informacion["data"] = null;
		}else{
			    $data = mysqli_fetch_assoc($resp);
		
				$newpassword = $obj->create_hash($pass);
				$q = "UPDATE usuarios SET usu_password='$newpassword' WHERE usu_id = '$id'";
				$r = mysqli_query($conexion, $q);
				if(!$r){
					$informacion["respuesta"] = "ERROR";
					$informacion["descripcionError"] = "ERROR AL TRATAR DE ACTUALIZAR LA CONTRASEÑA";
					$informacion["data"] = null;
				}else{
					$informacion["respuesta"] = "BIEN";
					$informacion["descripcionError"] = null;
					$informacion["data"] = null;
				}
			}
		
		echo json_encode($informacion);
    break;

	case "editarUsuario":
		$rolup = $_POST["rolup"];
		$estadoup = $_POST["estadoup"];
		$nombreup = $_POST["nombreup"];
		$telefonoup = $_POST["telefonoup"];
		$direccion = $_POST["direccion"];
		$descripcionbarbero = $_POST["descripcionbarbero"];
		$idusuario = $_POST["idusuario"];

		if($rolup=='Barbero'){
			$q = "UPDATE usuarios SET usu_rol='$rolup', usu_estado='$estadoup', usu_nombre='$nombreup', usu_telefono='$telefonoup', usu_direccion='$direccion', usu_barberoDescripcion='$descripcionbarbero' WHERE usu_id='$idusuario'";
		}else{
			$q = "UPDATE usuarios SET usu_rol='$rolup', usu_estado='$estadoup', usu_nombre='$nombreup', usu_telefono='$telefonoup', usu_direccion='$direccion' WHERE usu_id='$idusuario'";
		}

		$r = mysqli_query($conexion, $q);
		if(!$r){
			$informacion["respuesta"] = "ERROR";
		}else{
			$informacion["respuesta"] = "BIEN";
		}

		echo json_encode($informacion);

		
		

	break;















}//fin del switch



?>