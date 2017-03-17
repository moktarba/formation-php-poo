<?php
  class DBM {
    private $_db;
    private $_classname;

    public function hydrate($data){
      $method= "set".ucfirst($data);
      foreach ($data as $key => $value) {
        $this->$method($value);
      }
    }
    public function __construct($classname){
      $this->setDb('mysql:host=localhost; dbname=formation-php-poo', 'root','');
      $this->_classname= $classname;
    }

    public function findAll(){
      $object = [];
      $request= "SELECT * FROM {$this->classname} ";
      $results= $this->_db->query($request);
      while($data = $results->fetch(PDO::FETCH_ASSOC) ){
        $object[] = new $classname($data);
      }
      return $object;
    }

    public function findById($id){
      $request= "SELECT FROM {this->classame} where id =:id ";
      $result = $this->_db->prepare($request);
      $result->bindValue(':id', $id);
      $data= $result->fetch();

      $object = new $this->_classname($data);
    }

    public function delete($id){
      $request = "DELETE FROM {$this->classname} WHERE id =:id";
      $result= $this->_db->prepare($request);
      $r = $result->bindValue(':id', $id);
      return $r->execute();
    }

    public function getDb(){
      return $this->_db;
    }
    public function setDb($db){
      $this->_db= $db;
    }
  }
 ?>
