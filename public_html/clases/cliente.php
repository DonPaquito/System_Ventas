<?php

class Cliente {
        
	private $id;
	private $nombre;
	private $ruc;
	private $direccion;
	private $telefono;
	private $conn;

	public function conectar_db($cn){
		$this->conn = $cn;
	}

	public function sanitize($var) {
		$valor = mysqli_real_escape_string($this->conn, $var);
		return $valor;
	}
	
	public function lista_cliente(){
		$sql = "SELECT * FROM cliente";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}

    public function consulta($id){
		$sql = "SELECT * FROM cliente WHERE id=$id";
		$res = mysqli_query($this->conn, $sql);
		$return = mysqli_fetch_array($res);
		return $return;
	}
	
	public function obtenerNombreCliente($id) {
		$sql = "SELECT nombre FROM cliente WHERE id=$id";
		$res = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_array($res);	
		return $row['nombre'];
	}
	
	
	
	public function agrega_cliente($nombre, $ruc, $direccion, $telefono){
		$sql = "INSERT INTO cliente(nombre, ruc, direccion_cliente, telefono_cliente) VALUES ('$nombre', '$ruc', '$direccion', '$telefono')";
		$res = mysqli_query($this->conn, $sql);
		if ($res){
			return true;
		} else {
			return false;
		}
	}	

	public function modifica_cliente($id, $nombre, $ruc, $direccion, $telefono){
		$sql = "UPDATE cliente SET nombre='$nombre', ruc='$ruc', direccion_cliente='$direccion', telefono_cliente='$telefono' WHERE id='$id'";
		$res = mysqli_query($this->conn, $sql);
		if ($res){
			return true;
		} else {
			return false;
		}
	}
		
	public function borrar($id){
		$sql = "DELETE FROM cliente WHERE id=$id";
		$res = mysqli_query($this->conn, $sql);
		if ($res){
			return true;
		} else {
			return false;
		}
	}
	public function lee_id($nombre) {
		$sql = "SELECT id FROM cliente WHERE nombre='$nombre'";
		$res = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($res);
		
		if ($row) {
			return (int)$row['id'];
		} else {
			return 0;
		}
	}
	public function leerNombre($cadena){
        $sql = "SELECT * FROM cliente WHERE nombre LIKE '$cadena%';";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }
	public function leerDireccion($cadena){
        $sql = "SELECT * FROM cliente WHERE direccion_cliente LIKE '$cadena%';";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }
}
?>
