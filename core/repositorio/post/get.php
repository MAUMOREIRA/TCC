<?php
require_once '../../mysql.php';

// Parametros
$id = $_GET['id'] ?? null;

try {
  // Busca no banco
  [$post] = buscar(
    'post',
    [
      '*',
      ' (select nome 
              from usuario
              where usuario.id = post.usuario_id) as nome'
    ],
    [['id', '=', $id]],
    null,
    1
  );

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($post);

} catch(Exception $e) {
  error_log($e);
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}
