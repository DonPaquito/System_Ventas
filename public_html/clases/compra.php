<?php

class Compra {
        
    private $id;
    private $fecha;
    private $id_proveedor;

    public function conectar_db($cn){
        $this->conn = $cn;
    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->conn, $var);
        return $valor;
    }
    
    public function lista_ventas(){
        $sql = "SELECT * FROM compra";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM compra WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }
    
    public function agrega_compra($fecha, $id_proveedor) {
        $sql = "INSERT INTO compra (fecha, id_proveedor) VALUES ('$fecha', '$id_proveedor')";
        $res = mysqli_query($this->conn, $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    
    public function modifica_compra($id, $fecha, $id_proveedor) {
        $sql = "UPDATE compra SET fecha='$fecha', id_proveedor='$id_proveedor' WHERE id='$id'";
        $res = mysqli_query($this->conn, $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    
        
    public function borrar($id){
        $sql = "DELETE FROM compra WHERE id=$id";
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
            return 0; 
        }
    }
}
?>
