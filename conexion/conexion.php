<?php

    class Conectar{
        public static function conexion(){
            $con = new PDO("mysql:host=localhost;dbname=frava", "root", "");
            return $con;
        }


    }

?>