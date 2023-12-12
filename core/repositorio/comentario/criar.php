<?php
session_start();
require_once '../../mysql.php';

try {
  $criterio = [
    ['email', '=', $_SESSION['usuario.email']],
    ['AND', 'ativo', '=', 1]
  ];

  [$usuario] = buscar(
    'usuario',
    ['id','nome','email'],
    $criterio,
    null,
    1
  );

  // Parametros
  $comentario = [
    "comentario" => $_POST['comentario'],
    "nota" => $_POST['nota'] ?? 2,
    "usuario_id" => $usuario['id'],
    "post_id" => $_POST['post_id']
  ];

  // Busca no banco
  insere('comentario', $comentario);

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode(true);

} catch (Exception $e) {
  error_log($e);
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}
