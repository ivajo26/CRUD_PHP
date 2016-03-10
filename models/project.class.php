<?php
require 'db_connection.php';

/**
 * Modelo de Autores
 */
class Project{
  var $Manger;
  var $db;

  function Project() {
    $this->Manager= new DBManager();
    $this->db = $this->Manager->Conneted();
  }

  function create($name, $id_adviser,$note, $line,$author){
    $todayh = getdate();
    $d = $todayh[mday];
    $m = $todayh[mon];
    $y = $todayh[year];
    $date_add = "$y-$m-$d";
    $sql = $this->db->prepare("INSERT INTO projects ( name, id_adviser, date_add, note, investigation_line) VALUES (?, ?, ?, ?, ?)");
    $sql->bindParam(1, $name);
    $sql->bindParam(2, $id_adviser);
    $sql->bindParam(3, $date_add);
    $sql->bindParam(4, $note);
    $sql->bindParam(5, $line);
    $sql->execute();
    $lastId=$this->db->lastInsertId();;
    $data = [true,$lastId];
    return $data;
  }

  function save_author($id_project,$id_author){
    $sql = $this->db->prepare("INSERT INTO propierty_projects ( id_author,id_project) VALUES (?, ?)");
    $sql->bindParam(1, $id_author);
    $sql->bindParam(2, $id_project);
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
