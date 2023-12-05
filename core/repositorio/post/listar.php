<?php
require_once '../../mysql.php';

// Parametros
$limit = $_GET['limit'] ?? null;
$offset = $_GET['offset'] ?? null;

try {
  // Busca no banco
  $posts = buscar(
    'post',
    [
      '*',
      ' (select nome 
              from usuario
              where usuario.id = post.usuario_id) as nome'
    ],
    [],
    'data_postagem DESC',
    $limit,
    $offset
  );

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($posts);

} catch(Exception $e) {
  error_log($e);
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}
