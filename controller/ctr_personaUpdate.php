<?php
 if(isset($_POST['idusuarioseleccionado'])){
    require_once __DIR__ . "/../modelos/persona.php";
    if( isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["fecha_nacimiento"]) && isset($_POST["sexo"]) && isset($_POST["estatura"]) && isset($_POST["idusuarioseleccionado"])){
        
        // Creamos un usuario
        $persona=new Persona();
        $persona->setId($_POST["idusuarioseleccionado"]);
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

        $save=$persona->actualizar();
        echo $save;

    }
 }
?>