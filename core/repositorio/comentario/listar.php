<?php
require_once '../../mysql.php';

// Parametros
$limit = $_GET['limit'] ?? null;
$offset = $_GET['offset'] ?? null;

try {
  // Busca no banco
  $comentarios = buscar(
    'comentario',
    [
      '*',
      '(select nome 
              from usuario
              where usuario.id = comentario.usuario_id) as "usuario.nome"'
    ],
    [],
    'data_criacao DESC',
    $limit,
    $offset
  );

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($comentarios);
} catch (Exception $e) {
  error_log($e);
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}
