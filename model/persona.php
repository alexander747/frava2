<?php
require_once  __DIR__ . "/../conexion/conexion.php";

class Persona extends Conectar{
    private $id;
    private $nombre;
    private $apellidos;
    private $fecha_nacimiento;
    private $sexo;
    private $estatura;
    private $colombiano;

    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }
 
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }


    public function getFechaNacimiento() {
        return $this->FechaNacimiento;
    }
 
    public function setFechaNacimiento($FechaNacimiento) {
        $this->fecha_nacimiento = $FechaNacimiento;
    }
 
 
    public function getSexo() {
        return $this->sexo;
    }
 
    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }
 
    public function getEstatura() {
        return $this->estatura;
    }
 
    public function setEstatura($estatura) {
        $this->estatura = $estatura;
    }

    public function getColombiano() {
        return $this->colombiano;
    }
 
    public function setColombiano($colombiano) {
        $this->colombiano = $colombiano;
    }
 


    public function guardar(){
        $sentencia = Conectar::conexion();

        $newDate = date("Y/m/d", strtotime($this->fecha_nacimiento));

        $sql = "INSERT INTO persona(per_nombre, per_apellidos, per_fecha_nacimiento, per_sexo, per_estatura, per_colombiano) VALUES(:nombre, :apellidos, :fecha_nacimiento, :sexo, :estatura, :colombiano)";

        $stmt = $sentencia->prepare($sql);  

        $stmt->bindParam(":nombre", $this->nombre,PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $this->apellidos,PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $newDate, PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $this->sexo, PDO::PARAM_STR);
        $stmt->bindParam(":estatura", $this->estatura, PDO::PARAM_STR);
        $stmt->bindParam(":colombiano", $this->colombiano, PDO::PARAM_STR);

        // $rows = $sentencia->rowCount();
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getPersonas(){
        $sentencia = Conectar::conexion();
        
        $sql="SELECT * FROM persona ORDER BY per_id DESC";

        // $sql = "SELECT * FROM persona ORDER BY per_id DESC LIMIT $registros OFFSET $omitirNfilas";

        $stmt = $sentencia->prepare($sql);

        if($stmt->execute()){
            $data = [];
            while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data['data'][] = $fila;
            }
            return $data;
        }else{
            return "ERROR";
        }
    }

    public function borrarPersona(){
        $sentencia = Conectar::conexion();
        $sql = "DELETE FROM persona WHERE per_id='$this->id'";
        $stmt = $sentencia->prepare($sql);  
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function getUsuario(){
        $sentencia = Conectar::conexion();
        $sql="SELECT * FROM persona WHERE per_id='$this->id'";
        $stmt = $sentencia->prepare($sql);

        if($stmt->execute()){
            $data = [];
            while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $fila;
            }
            return $data;
        }else{
            return "ERROR";
        }
    }

    public function actualizar(){
        $sentencia = Conectar::conexion();

        $newDate = date("Y/m/d", strtotime($this->fecha_nacimiento));

        $sql = "UPDATE persona SET per_nombre=:nombre, per_apellidos=:apellidos, per_fecha_nacimiento=:fecha_nacimiento, per_sexo=:sexo, per_estatura=:estatura, per_colombiano=:colombiano WHERE per_id=:id";

        $stmt = $sentencia->prepare($sql);  

        $stmt->bindParam(":id", $this->id,PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $this->nombre,PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $this->apellidos,PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $newDate, PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $this->sexo, PDO::PARAM_STR);
        $stmt->bindParam(":estatura", $this->estatura, PDO::PARAM_STR);
        $stmt->bindParam(":colombiano", $this->colombiano, PDO::PARAM_STR);

        // $rows = $sentencia->rowCount();
        if($stmt->execute()){
            return "SUCCESS";
        }else{
            return "ERROR";
        }
    }
 
}
?>