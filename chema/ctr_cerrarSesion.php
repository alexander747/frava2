<?php
$accion = $_GET["accion"];
switch($accion){
     case 1:
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../index.php');

    break;
}