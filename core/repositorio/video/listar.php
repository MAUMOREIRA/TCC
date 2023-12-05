<?php
require_once '../../mysql.php';

// Parametros
$limit = $_GET['limit'] ?? null;
$offset = $_GET['offset'] ?? null;

try {
  // Busca no banco
  $videos = buscar(
    'video',
    [
      'titulo',
      'data_postagem',
      'id',
      'link',
      ' (select nome 
              from usuario
              where usuario.id = video.usuario_id) as nome'
    ],
    [],
    'data_postagem DESC',
    $limit,
    $offset
  );

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($videos);

} catch(Exception $e) {
  error_log($e);
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}
