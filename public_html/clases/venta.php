<?php

class Venta {
        
    private $id;
    private $fecha;
    private $tipo_venta;
    private $id_cliente;
    private $id_empleado;
    private $id_documento;
    private $conn;
    private $numero_documento;

    public function conectar_db($cn){
        $this->conn = $cn;
    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->conn, $var);
        return $valor;
    }
    
    public function lista_ventas(){
        $sql = "SELECT * FROM venta";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM venta WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }
    
    public function agrega_venta($fecha, $tipo_venta, $id_cliente, $id_empleado, $id_documento, $numero_documento){
        $sql = "INSERT INTO venta (fecha, tipo_venta, id_cliente, id_empleado, id_documento, numero_documento) VALUES ('$fecha', '$tipo_venta', '$id_cliente', '$id_empleado', '$id_documento', '$numero_documento')";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }
    
    public function modifica_venta($id, $fecha, $tipo_venta, $id_cliente, $id_empleado, $id_documento, $numero_documento){
        $sql = "UPDATE venta SET fecha='$fecha', tipo_venta='$tipo_venta', id_cliente='$id_cliente', id_empleado='$id_empleado', id_documento='$id_documento', numero_documento='$numero_documento' WHERE id='$id'";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }
        
    public function borrar($id){
        $sql = "DELETE FROM venta WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function lee_ultima_id() {
        $sql = "SELECT LAST_INSERT_ID() as id";
        $res = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($res);
    
        if ($row) {
            return (int)$row['id'];
        } else {
            return 0; // O cualquier otro valor que desees para indicar que no se encontró la última venta.
        }
    }
}
?>
