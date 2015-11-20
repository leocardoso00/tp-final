
<?php


require 'TimeDAO.php';
require 'JogadorDAO.php';

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');


$app->get('/times', function() {
  // recupera todos os clientes
  $clientes = TimeDAO::getAll();
  echo json_encode($clientes);
  
  
});

$app->get('/times', function($name) {
  
  $clientes = TimeDAO::getTimebyCamp($name);
  echo json_encode($clientes);
    
});

$app->post('/times', function() {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();
  // insere o cliente
  $novoCliente = json_decode($request->getBody());
  $novoCliente = TimeDAO::addTime($novoCliente);
  echo json_encode($novoCliente);
});

$app->delete('/times', function($name) {
  // exclui o cliente
  $isDeleted = TimesDAO::deleteTime($name);
  // verifica se houve problema na exclusão
  
});


$app->get('/jogadores', function() {
  // recupera todos os clientes
  $clientes = JogadorDAO::getAll();
  echo json_encode($clientes);
  
  
});

$app->delete('/jogadores', function($name) {
  // exclui o cliente
  $isDeleted = JogadorDAO::deleteJogador($name);
  // verifica se houve problema na exclusão
  
});


$app->get('/jogadores', function($name) {
  
  $clientes = JogadorDAO::getJogadorbyTime($name);
  echo json_encode($clientes);
    
});


$app->post('/jogadores', function() {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();
  // insere o cliente
  $novoCliente = json_decode($request->getBody());
  $novoCliente = JogadorDAO::addJogador($novoCliente);
  echo json_encode($novoCliente);
});


$app->get('/campeonatos', function() {
  // recupera todos os clientes
  $clientes = CampeonatoDAO::getAll();
  echo json_encode($clientes);
  
  
});
$app->get('/campeonatos', function($name) {
  // recupera todos os clientes
  $clientes = CampeonatoDAO::getJogadoresbyCamp($name);
  echo json_encode($clientes);
  
  
});

$app->post('/campeonatos', function() {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();
  // insere o cliente
  $novoCliente = json_decode($request->getBody());
  $novoCliente = CampeonatoDAO::addCampeonato($novoCliente);
  echo json_encode($novoCliente);
});

$app->delete('/campeonatos', function() {
  // exclui o cliente
  $request = \Slim\Slim::getInstance()->request();
  // insere o cliente
  $novoCliente = json_decode($request->getBody());
  $isDeleted = CampeonatoDAO::deleteCampeonato($novoCliente);
  // verifica se houve problema na exclusão
  
});

$app->run();

?>