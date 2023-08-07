<?php

class Proveedor {
        
    private $id;
    private $nombre;
    private $id_linea;
    private $conn;

    public function conectar_db($cn){
        $this->conn = $cn;
    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->conn, $var);
        return $valor;
    }

    public function listaprov(){
        $sql = "SELECT * FROM proveedor";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM proveedor WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }

    public function agrega_proveedor($nombre, $id_linea){
        $sql = "INSERT INTO proveedor(nombre, id_linea) VALUES ('$nombre', $id_linea)";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function modifica_proveedor($id, $nombre, $id_linea){
        $sql = "UPDATE proveedor SET nombre='$nombre', id_linea=$id_linea WHERE id=$id";

        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id){
        $sql = "DELETE FROM proveedor WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function lee_id($nombre) {
		$sql = "SELECT id FROM proveedor WHERE nombre='$nombre'";
		$res = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($res);
		
		if ($row) {
			return (int)$row['id'];
		} else {
			return 0;
		}
	}

    public function set_id($id){
        $this->id = $id;
    }

    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }

    public function set_id_linea($id_linea){
        $this->id_linea = $id_linea;
    }

    public function get_id(){
        return $this->id;
    }

    public function get_nombre(){
        return $this->nombre;
    }

    public function get_id_linea(){
        return $this->id_linea;
    }
}
?>
