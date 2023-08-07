<?php

class Linea {
        
    private $id;
    private $nombre;
    private $conn;

    public function conectar_db($cn){
        $this->conn = $cn;
    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->conn, $var);
        return $valor;
    }

    public function listaline(){
        $sql = "SELECT * FROM linea";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM linea WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }

    public function agrega_linea($nombre){
        $sql = "INSERT INTO linea(nombre) VALUES ('$nombre')";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function modifica_linea($id, $nombre){
        $sql = "UPDATE linea SET nombre='$nombre' WHERE id='$id'";

        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id){
        $sql = "DELETE FROM linea WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function obtenerNombreLinea($id) {
		$sql = "SELECT nombre FROM linea WHERE id='$id'";
		$res = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_array($res);	
		return $row['nombre'];
	}
	
	public function obtenerIdLinea($nombre) {
		$sql = "SELECT * FROM linea WHERE nombre = '$nombre'";

		$res = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_array($res);	
		return $row['id'];
	}
    
    public function leerCuando($cadena){
        $sql = "SELECT * FROM linea WHERE nombre LIKE '$cadena%';";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }
}
?>
