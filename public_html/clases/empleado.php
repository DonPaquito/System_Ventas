<?php

class Empleado {
        
    private $id;
    private $nombre;
    private $telefono;
    private $direccion;
    private $usuario;
    private $contrasena;
    private $conn;

    public function conectar_db($cn){
        $this->conn = $cn;
    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->conn, $var);
        return $valor;
    }

    public function listaemple(){
        $sql = "SELECT * FROM empleado";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM empleado WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }

    public function agrega_empleado($nombre, $telefono, $direccion, $usuario, $contrasena){

        $usu_pass_hash = password_hash($contrasena, PASSWORD_DEFAULT);

			$sql = "insert into empleado(nombre,telefono,direccion, usuario, contrasena)
                    values ('$nombre','$telefono','$direccion','$usuario','$usu_pass_hash')";
			
			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
    }

    public function modifica_empleado($id, $nombre, $telefono, $direccion, $usuario, $contrasena){
        $sql = "UPDATE empleado SET 
        nombre='$nombre',
        telefono='$telefono',
        direccion='$direccion',
        usuario='$usuario',
        contrasena='$contrasena'
        WHERE id='$id'";

        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id){
        $sql = "DELETE FROM empleado WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }
    public function lee_datos($usuario){
        $sql = "SELECT * FROM empleado where usuario='$usuario'";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res );
        return $return ;
    }

    public function obtenerNombreEmpleado($id) {
		$sql = "SELECT nombre FROM empleado WHERE id=$id";
		$res = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_array($res);	
		return $row['nombre'];
	}

    public function lee_id($nombre) {
		$sql = "SELECT id FROM empleado WHERE nombre='$nombre'";
		$res = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($res);
		
		if ($row) {
			return (int)$row['id'];
		} else {
			return 0;
		}
	}

}
?>
