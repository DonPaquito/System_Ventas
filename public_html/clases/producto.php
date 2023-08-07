<?php

class Producto {
    private $id;
    private $nombre_producto;
    private $unidad_medida;
    private $stock;
    private $precio_unidad;
    private $costo_unidad;
    private $conn;

    public function conectar_db($cn){
        $this->conn = $cn;
    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->conn, $var);
        return $valor;
    }

    public function listaprodu(){
        $sql = "SELECT * FROM producto";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM producto WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }

    public function agrega_producto($nombre, $unidad, $cantidad, $precio, $costo){
        $sql = "INSERT INTO producto (nombre_producto, unidad_medida, stock, precio_unidad, costo_unidad) 
                VALUES ('$nombre', '$unidad', $cantidad, $precio, $costo)";
        $res = mysqli_query($this->conn, $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function modifica_producto($id, $nombre, $unidad, $cantidad, $precio, $costo){
        $sql = "UPDATE producto SET
                nombre_producto='$nombre',
                unidad_medida='$unidad',
                stock=$cantidad,
                precio_unidad=$precio,
                costo_unidad=$costo 
                WHERE id='$id'";
            
        $res = mysqli_query($this->conn, $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id){
        $sql = "DELETE FROM producto WHERE id=$id";
        $res = mysqli_query($this->conn, $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarIdProducto($id) {
        $sql = "SELECT * FROM producto WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    
        return null;
    }
    

    public function leerCuando($columna,$cadena){
        $sql = "SELECT * FROM producto WHERE $columna  LIKE '$cadena%';";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function ordenarPo($columna,$orden){
        if($orden){
            $sql = "SELECT * FROM producto ORDER BY $columna ASC";
        }
        else{
            $sql = "SELECT * FROM producto ORDER BY $columna DESC";
        }
        return mysqli_query($this->conn, $sql);
    }
    

    
}
?>
