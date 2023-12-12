<?php
session_start();
require_once '../mysql.php';

try {
  $criterio = [
    ['email', '=', $_POST['email']],
    ['AND', 'ativo', '=', 1]
  ];

  [$retorno] = buscar(
    'usuario',
    ['id', 'nome', 'email', 'senha'],
    $criterio,
    null,
    1
  );

  if ($retorno == NULL) {
    throw new Exception('Usuário não encontrado');
  }

  echo json_encode($retorno);
  // TODO: Verificar se a senha confere

  $_SESSION["usuario.nome"] = $retorno['nome'];
  $_SESSION["usuario.email"] = $retorno['email'];

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($retorno);
} catch (Exception $e) {
  error_log($e);
  throw $e;
}
