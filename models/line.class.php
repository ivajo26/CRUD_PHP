<?php
require 'db_connection.php';

/**
 * Modelo de Linea de Investigacion
 */
class Line{
  var $Manger;
  var $db;

  function Line() {
    $this->Manager= new DBManager();
    $this->db = $this->Manager->Conneted();
  }

  function create($name){
    $sql = $this->db->prepare("INSERT INTO investigation_line (name) VALUES (?)");
    $sql->bindParam(1, $name);
    $sql->execute();
    return true;
  }

  function read_all(){
    $sql = $this->db->prepare("SELECT * FROM investigation_line");
    $sql->execute();
    return $sql->fetchAll();
  }

  function read_for_id($id){
    $sql = $this->db->prepare("SELECT * FROM investigation_line WHERE id = ?");
    $sql->bindParam(1, $id);
    $sql->execute();
    return $sql;
  }

  function update($name, $id){
    $sql = $this->db->prepare("UPDATE investigation_line SET name = ? WHERE id = ?");
    $sql->bindParam(1, $name);
    $sql->bindParam(2, $id);
    $sql->execute();
  }

  function delete($id){
    $sql = $this->db->prepare("DELETE FROM investigation_line WHERE id = ? ");
    $sql->bindParam(1, $id);
    $sql->execute();
  }
}

?>
