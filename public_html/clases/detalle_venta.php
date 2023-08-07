<?php

class DetalleVenta {
        
    private $id;
    private $id_venta;
    private $id_producto;
    private $cantidad;
    private $conn;

    public function conectar_db($cn){
        $this->conn = $cn;
    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->conn, $var);
        return $valor;
    }
    
    public function lista_detalles_venta(){
        $sql = "SELECT * FROM detalle_venta";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM detalle_venta WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }
    
    public function agrega_detalle_venta($id_venta, $id_producto, $cantidad){
        $sql = "INSERT INTO detalle_venta(id_venta, id_producto, cantidad) VALUES ('$id_venta', '$id_producto', '$cantidad')";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }   

    public function modifica_detalle_venta($id, $id_venta, $id_producto, $cantidad){
        $sql = "UPDATE detalle_venta SET id_venta='$id_venta', id_producto='$id_producto', cantidad='$cantidad' WHERE id='$id'";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }
        
    public function borrar($id){
        $sql = "DELETE FROM detalle_venta WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }
    public function buscarIdVenta($id) {
        $sql = "SELECT * FROM detalle_venta WHERE id_venta = $id";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
}
?>
