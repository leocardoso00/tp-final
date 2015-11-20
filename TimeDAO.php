<?php

require 'Connection.php';


class TimeDAO
{
    
     public static function getAll()
  {
    $connection = Connection::getConnection();
    
    $sql = "SELECT time, tecnico, localizacao FROM times";
    // recupera todos os clientes 
    $result  = mysqli_query($connection, $sql);
    $clientes = array();
    while ($cliente = mysqli_fetch_object($result)) {
      if ($cliente != null) {
        $clientes[] = $cliente;
      }
    }
    
    return $clientes;
  }
  
  
  public static function getTimebyName($name){
      
    $connection = Connection::getConnection();
    
    $sql = "SELECT time FROM times where time='$name'";
    // recupera todos os clientes'
    $result  = mysqli_query($connection, $sql);
    $clientes = array();
    while ($cliente = mysqli_fetch_object($result)) {
      if ($cliente != null) {
        $clientes[] = $cliente;
      }
    }
    return $clientes;
      
  }
  
   public static function getIdbyName($name){
      
       $connection = Connection::getConnection();
    
    $sql = "SELECT id FROM times where time='$name'";
    // recupera todos os clientes'
    $result  = mysqli_query($connection, $sql);
    
    return mysqli_fetch_object($result);
      
  }
  
  
    public static function addTime($time) {
    $connection = Connection::getConnection();
    $sql = "INSERT INTO times (time, tecnico, localizacao) VALUES ('$time->time', '$time->tecnico', '$time->localizacao')";
    $result  = mysqli_query($connection, $sql);
    $time = TimeDAO::getIdbyName($time->time);
    $campeonato = CampeonatoDAO::getIdbyName($time->campeonato);
    $sql = "INSERT INTO time_campeonato (time_id, campeonato_id) VALUES ('$time', '$campeonato')";
    $result  = mysqli_query($connection, $sql);
    $novoTime = TimeDAO::getTimeByName($time->nome);
    
    return $novoTime;
  }
 
public static function getTimebyCamp($name){
      
       $connection = Connection::getConnection();
    $id = CampeonatoDAO::getIdbyName($name)->id;
    echo $id;
    $sql = "SELECT TIME
FROM times
JOIN time_campeonato tc ON id = tc.time_id
AND tc.campeonato_id =$id";
    // recupera todos os clientes'
    $result  = mysqli_query($connection, $sql);
    $clientes = array();
    while ($cliente = mysqli_fetch_object($result)) {
      if ($cliente != null) {
        $clientes[] = $cliente;
      }
    }
    return $clientes;
      
  }
  public static function deleteTime($name) {
    $connection = Connection::getConnection();
    $id = TimeDAO::getIdbyName($name->time)->id;
    $sql = "DELETE FROM times WHERE id=$id";
    return $result  = mysqli_query($connection, $sql);
    
  }

}