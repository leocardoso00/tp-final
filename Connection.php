<?php


class Connection

{
    
  public static $database = "daw-aluno10";
  public static $address = "alunos.coltec.ufmg.br";
  public static $user = "daw-aluno10";
  public static $password = "leonardo";
  public static function getConnection() {
    $connection = mysqli_connect(Connection::$address, Connection::$user, Connection::$password, Connection::$database);
    mysqli_set_charset($connection,"utf8");
    return $connection;
  }
}