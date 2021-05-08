<?php
if( isset($_POST["datospersona"]) ){
    require_once "../modelos/persona.php";
    $persona=new Persona();
    $persona->setId($_POST["datospersona"]);
    $respuesta = $persona->getUsuario();
    echo json_encode($respuesta);
}
?>