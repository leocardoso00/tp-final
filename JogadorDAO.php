<?php

class JogadorDAO
{
    
    
     public static function getAll()
  {
    $connection = Connection::getConnection();
    
    $sql = "SELECT j.nome,j.posicao,j.idade,j.nacionalidade,j.numero,t.time FROM jogadores j JOIN times t where j.time_id=t.id";
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
       
    $sql = "SELECT id FROM jogadores where nome='$name'";
    // recupera todos os clientes'
    $result  = mysqli_query($connection, $sql);
    
    return mysqli_fetch_object($result);
      
  }
  
  public static function getJogadorbyTime($name){
      
       $connection = Connection::getConnection();
       $id = TimeDAO::getIdbyName($name)->id;
       
       $sql = "SELECT nome FROM jogadores where time_id=$id";
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
  
  public static function addJogador($jogador) {
    $connection = Connection::getConnection();
    $id = TimeDAO::getIdbyName($jogador->time)->id;
    $sql = "INSERT INTO jogadores (nome, posicao, idade, nacionalidade,numero,time_id) VALUES ('$jogador->nome', '$jogador->posicao', $jogador->idade, '$jogador->nacionalidade', $jogador->numero,$id)";
    $result  = mysqli_query($connection, $sql);
    if($result)
    $novoTime = JogadorDAO::getAll();
    
    return $novoTime;
  }
  public static function deleteJogador($jogador) {
    $connection = Connection::getConnection();
    $id = JogadorDAO::getIdbyName($jogador->nome)->id;
    $sql = "DELETE FROM jogadores WHERE id=$id";
    return $result  = mysqli_query($connection, $sql);
    
  }
    
    
}