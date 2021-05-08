<?php
 include("../model/persona.php");

$accion = $_POST['accion'];

switch($accion){
     
    case 'listarusuarios':
        $persona=new Persona();
        $allusers=$persona->getPersonas();
        echo json_encode($allusers);
    break;
     
    case 'crear':
            $persona=new Persona();
            $persona->setNombre($_POST["nombre"]);
            $persona->setApellidos($_POST["apellidos"]);
            $persona->setFechaNacimiento($_POST["fecha_nacimiento"]);
            $persona->setSexo($_POST["sexo"]);
            $persona->setEstatura($_POST["estatura"]);
            
            if( isset($_POST["colombiano"]) ){
                $persona->setColombiano("Si");
            }else{
                $persona->setColombiano("No");
            }
           $respuesta= $persona->guardar();
           echo $respuesta;
    break;
case 'editar':
    $persona=new Persona();
    $persona->setNombre($_POST["nombre"]);
    $persona->setApellidos($_POST["apellidos"]);
    $persona->setFechaNacimiento($_POST["fecha_nacimiento"]);
    $persona->setSexo($_POST["sexo"]);
    $persona->setEstatura($_POST["estatura"]);
    $persona->setId($_POST["idactualizar"]);
    
    if( isset($_POST["colombiano"]) ){
        $persona->setColombiano("Si");
    }else{
        $persona->setColombiano("No");
    }
    $respuesta = $persona->actualizar();
    echo $respuesta;
break;

case 'eliminar':
            $persona=new Persona();
            $persona->setId($_POST["id"]);
            $respuesta = $persona->borrarPersona();
            echo $respuesta;
        

break;

     

 
}
?>