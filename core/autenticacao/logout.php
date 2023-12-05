<?php
  session_start();

  if(isset($_SESSION['usuario.nome'])) {
    unset($_SESSION['usuario.nome']);
  }
  
  if(isset($_SESSION['usuario.email'])) {
    unset($_SESSION['usuario.email']);
  }
?>