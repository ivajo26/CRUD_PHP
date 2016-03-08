<?php
require 'db_connection.php';

/**
 * Modelo de Autores
 */
class Author{
  var $Manger;
  var $db;

  function Author() {
    $this->Manager= new DBManager();
    $this->db = $this->Manager->Conneted();
  }

  function create($first_name, $last_name){
    $sql = $this->db->prepare("INSERT INTO  author (first_name , last_name) VALUES (?,?)");
    $sql->bindParam(1, $first_name);
    $sql->bindParam(2, $last_name);
    $sql->execute();
    return true;
  }

  function read_all(){
    $sql = $this->db->prepare("SELECT * FROM author");
    $sql->execute();
    return $sql;
  }

  function read_for_id($id){
    $sql = $this->db->prepare("SELECT * FROM author WHERE id = ?");
    $sql->bindParam(1, $id);
    $sql->execute();
    return $sql;
  }

  function update($first_name, $last_name,$id){
    $sql = $this->db->prepare("UPDATE author SET first_name = ?, last_name = ? WHERE id = ?");
    $sql->bindParam(1, $first_name);
    $sql->bindParam(2, $last_name);
    $sql->bindParam(3, $id);
    $sql->execute();
  }

  function delete($id){}
}

?>
