<?php

class CampeonatoDAO
{

      public static function getAll()
  {
    $connection = Connection::getConnection();
    
    $sql = "SELECT nome FROM campeonato";
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
  
  
  public static function getIdbyName($name){
      
       $connection = Connection::getConnection();
    
    $sql = "SELECT id FROM campeonato where nome='$name'";
    // recupera todos os clientes'
    $result  = mysqli_query($connection, $sql);
    
    return mysqli_fetch_object($result);
      
  }
  public static function addCampeonato($campeonato) {
    $connection = Connection::getConnection();
   
    $sql = "INSERT INTO campeonato (nome) VALUES ('$campeonato->nome')";
   
    return $result  = mysqli_query($connection, $sql);
  }
    
  public static function getJogadoresbyCamp($name){
      
       $connection = Connection::getConnection();
    $id = CampeonatoDAO::getIdbyName($name)->id;
    
    $sql = "SELECT nome
FROM jogadores j
JOIN time_campeonato tc ON j.time_id = tc.time_id
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
    
  public static function deleteCampeonato($campeonato) {
    $connection = Connection::getConnection();
    $id = CampeonatoDAO::getIdbyName($campeonato->nome)->id;
    $sql = "DELETE FROM campeonato WHERE id=$id";
    return $result  = mysqli_query($connection, $sql);
    
  }  
    
    
    
}