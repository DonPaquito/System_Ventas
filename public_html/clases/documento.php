<?php

class Documento {
        
	private $id;
	private $nombre;
	private $numero_actual;
	private $conn;

	public function conectar_db($cn){
		$this->conn = $cn;
	}

	public function sanitize($var) {
		$valor = mysqli_real_escape_string($this->conn, $var);
		return $valor;
	}
	
	public function listadocs(){
		$sql = "SELECT * FROM documento";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}

    public function consulta($id){
		$sql = "SELECT * FROM documento WHERE id=$id";
		$res = mysqli_query($this->conn, $sql);
		$return = mysqli_fetch_array($res);
		return $return;
	}
	
	public function agrega_documento($nombre, $numero_actual){
		$sql = "INSERT INTO documento(nombre, numero_actual) VALUES ('$nombre', '$numero_actual')";
		$res = mysqli_query($this->conn, $sql);
		if ($res){
			return true;
		} else {
			return false;
		}
	}	

	public function modifica_documento($id, $nombre, $numero_actual){
		$sql = "UPDATE documento SET nombre='$nombre', numero_actual='$numero_actual' WHERE id='$id'";
		$res = mysqli_query($this->conn, $sql);
		if ($res){
			return true;
		} else {
			return false;
		}
	}
		
	public function borrar($id){
		$sql = "DELETE FROM documento WHERE id=$id";
		$res = mysqli_query($this->conn, $sql);
		if ($res){
			return true;
		} else {
			return false;
		}
	}

	public function lee_id($nombre) {
		$sql = "SELECT id FROM documento WHERE nombre='$nombre'";
		$res = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($res);
		
		if ($row) {
			return (int)$row['id'];
		} else {
			return 0;
		}
	}

	public function obtenerNombreDocumento($id) {
		$sql = "SELECT nombre FROM documento WHERE id=$id";
		$res = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_array($res);	
		return $row['nombre'];
	}

}
?>
