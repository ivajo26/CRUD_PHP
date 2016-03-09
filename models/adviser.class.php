<?php
require 'db_connection.php';

/**
 * Modelo de Autores
 */
class Adviser{
  var $Manger;
  var $db;

  function Adviser() {
    $this->Manager= new DBManager();
    $this->db = $this->Manager->Conneted();
  }

  function create($first_name, $last_name){
    $sql = $this->db->prepare("INSERT INTO  adviser (first_name , last_name) VALUES (?,?)");
    $sql->bindParam(1, $first_name);
    $sql->bindParam(2, $last_name);
    $sql->execute();
    return true;
  }

  function read_all(){
    $sql = $this->db->prepare("SELECT * FROM adviser");
    $sql->execute();
    return $sql->fetchAll();
  }

  function read_for_id($id){
    $sql = $this->db->prepare("SELECT * FROM adviser WHERE id = ?");
    $sql->bindParam(1, $id);
    $sql->execute();
    return $sql;
  }

  function update($first_name, $last_name,$id){
    $sql = $this->db->prepare("UPDATE adviser SET first_name = ?, last_name = ? WHERE id = ?");
    $sql->bindParam(1, $first_name);
    $sql->bindParam(2, $last_name);
    $sql->bindParam(3, $id);
    $sql->execute();
  }

  function delete($id){
    $sql = $this->db->prepare("DELETE FROM adviser WHERE id = ? ");
    $sql->bindParam(1, $id);
    $sql->execute();
  }
}

?>
