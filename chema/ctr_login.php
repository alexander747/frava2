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
    case "login":
	$pass = $_POST["pass"];
	$correo = $_POST["correo"];
	$obj = new Pass_crypt();
	$query="SELECT * FROM usuarios WHERE usu_correo='$correo'";
	$resp=mysqli_query($conexion,$query);
	if(!$resp){
		$informacion["respuesta"] = "ERROR";
		$informacion["descripcionError"] = "ERROR SERVIDOR AL TRATAR DE HACER LA CONSULTA";
      
	}else{
        $data = mysqli_fetch_assoc($resp);
        
        if($data){
		$passbd = $data["usu_password"];
		$validador = $obj->check_value($pass,$passbd);
		if($validador){
			$informacion["respuesta"] = "BIEN";
			$informacion["descripcionError"] = null;
			session_start();
			$_SESSION['usu_id']=$data['usu_id'];
			$_SESSION['usu_nombre']=$data['usu_nombre'];
			$_SESSION['usu_rol']=$data['usu_rol'];
			$_SESSION['usu_correo']=$data['usu_correo'];
		}else{
			$informacion["respuesta"] = "CREDENCIALESERRORNEAS";
			$informacion["descripcionError"] = "LAS CREDENCIALES INGRESADAS SON ERRONEAS";
            $informacion["data"] = null;
          
            
        }
    }else{
            $informacion["respuesta"] = "CREDENCIALESERRORNEAS";
			$informacion["descripcionError"] = null;
    }
        

	}
	echo json_encode($informacion);
	break;	

	

















}//fin del switch



?>