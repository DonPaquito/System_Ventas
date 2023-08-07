<?php
require_once 'core/crud.php';

class Animal extends Crud {
  private $id;
  private $name;
  private $specie;
  private $breed;
  private $gender;
  private $color;
  private $age;
  const TABLE='animal';
  public $pdo;
  public function __construct()  {
//En el constructor enviaremos el nombre de la tabla recuerden que lo necesitamos para //poder hacer las acciones crud.
    parent::__construct(self::TABLE);
    $this->pdo=parent::conexion();
  }

  public function __set($name,$value) {
    $this->$name=$value;
  }
  public function __get($name){
    return $this->$name;
  }

/*Aquí Insertamos un animal, tenemos que crear forzosamente este método porque en el CRUD lo agregamos como **abstract** sino lo agregamos obtendremos un error.*/
  public function create(){
    try{
    $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (name, specie,    
breed, gender, color, age) VALUES (?,?,?,?,?,?)");
    $stm->execute(array($this->name,$this->specie,$this->breed,$this->gender,$this->color,$this->age));
  }catch(PDOException $e){
    echo $e->getMessage();
  }

  }

/*Aquí actualizamos un animal, tenemos que crear forzosamente este método porque en el CRUD lo agregamos como **abstract** sino lo agregamos obtendremos un error.*/

  public function update(){
    try{
    $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET name=?, specie=?,  
breed=?,gender=?,color=?,age=? WHERE id=?");
    $stm->execute(array($this->name,$this->specie,$this->breed,$this->gender,$this->color,$this->age,$this->id));
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  }
}
?>
