<?php
session_start();
require_once '../../mysql.php';
$salt = '$exemplosaltifsp';

// Parametros
$usuario = [
  "nome" => $_POST['nome'],
  "email" => $_POST['email'],
  "senha" => crypt($_POST['senha'], $salt),
  "ativo" => 1
];

try {
  // Busca no banco
  $usuarios = insere('usuario', $usuario);

  $criterio = [
    ['email', '=', $_POST['email']],
    ['AND', 'ativo', '=', 1]
  ];

  [$retorno] = buscar(
    'usuario',
    ['id','nome','email'],
    $criterio,
    null,
    1
  );

  $_SESSION["usuario.nome"] = $retorno['nome'];
  $_SESSION["usuario.email"] = $retorno['email'];

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($retorno);

} catch (Exception $e) {
  error_log($e);
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}
