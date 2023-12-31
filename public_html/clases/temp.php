<?php

class Temp {
        
    private $id;
    private $cantidad;
    private $id_producto;
    private $conn;

    public function conectar_db($cn){
        $this->conn = $cn;
    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->conn, $var);
        return $valor;
    }

    public function listatemp(){
        $sql = "SELECT * FROM temp";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM temp WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }

    public function agrega_temp($cantidad, $id_producto){
        $sql = "INSERT INTO temp(cantidad, id_producto) VALUES ($cantidad, $id_producto)";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function modifica_temp($id, $cantidad, $id_producto){
        $sql = "UPDATE temp SET cantidad=$cantidad, id_producto=$id_producto WHERE id=$id";

        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id){
        $sql = "DELETE FROM temp WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }

    public function vaciarTemp() {
        $sql = "DELETE FROM temp";
        $res = mysqli_query($this->conn, $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function set_cantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function set_id_producto($id_producto){
        $this->id_producto = $id_producto;
    }

    public function get_id(){
        return $this->id;
    }

    public function get_cantidad(){
        return $this->cantidad;
    }

    public function get_id_producto(){
        return $this->id_producto;
    }
}
?>
