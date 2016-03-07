<?php
include'db_connection.php';

/**
 * Modelo de Asesores
 */
class Adviser{
  var $Manger;
  var $db;

  function Adviser() {
    $this->Manager= new DBManager();
    $this->db = $this->Manager->Conneted();
  }

  function create($first_name, $last_name){
    $sql = $this->db->prepare("INSERT INTO  author (first_name , last_name) VALUES (?,?)");
    $sql->bindParam(1, $first_name);
    $sql->bindParam(2, $last_name);
    $sql->execute();
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

  unction update($first_name, $last_name,$id){
    $sql = $this->db->prepare("UPDATE adviser SET first_name = ?, last_name = ? WHERE id = ?");
    $sql->bindParam(1, $first_name);
    $sql->bindParam(2, $last_name);
    $sql->bindParam(3, $id);
    $sql->execute();
  }
  
  function delete()$id){}
}

?>
