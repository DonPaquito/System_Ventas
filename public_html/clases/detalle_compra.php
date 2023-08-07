<?php

class DetalleCompra {
        
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
    
    public function lista_detalles_compra(){
        $sql = "SELECT * FROM detalle_compra";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM detalle_compra WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }
    
    public function agrega_detalle_compra($id_compra, $id_producto, $cantidad){
        $sql = "INSERT INTO detalle_compra(id_compra, id_producto, cantidad) VALUES ('$id_compra', '$id_producto', '$cantidad')";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }   

    public function modifica_detalle_compra($id, $id_compra, $id_producto, $cantidad){
        $sql = "UPDATE detalle_compra SET id_compra='$id_compra', id_producto='$id_producto', cantidad='$cantidad' WHERE id='$id'";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }
        
    public function borrar($id){
        $sql = "DELETE FROM detalle_compra WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }
    
    public function set_id($id){
        $this->id = $id;
    }
    
    public function set_id_venta($id_venta){
        $this->id_venta = $id_venta;
    }
    
    public function set_id_producto($id_producto){
        $this->id_producto = $id_producto;
    }
    
    public function set_cantidad($cantidad){
        $this->cantidad = $cantidad;
    }
    
    public function get_id(){
        return $this->id;
    }
    
    public function get_id_venta(){
        return $this->id_venta;
    }
    
    public function get_id_producto(){
        return $this->id_producto;
    }
    
    public function get_cantidad(){
        return $this->cantidad;
    }
}
?>
