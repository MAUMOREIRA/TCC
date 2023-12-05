<header>
  <?php session_start(); ?>

  <div class="container">

    <a href="/TCC" class="logo"><span>P</span>syque<span>D</span>iária.</a>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>

    <nav class="nav">
      <ul>
        <li><a href="/TCC">Página Inicial</a></li>
        <li><a href="/TCC#review">Comentários</a></li>
        <li><a href="/TCC#contact">Contato</a></li>
        <li><a href="/TCC#post">Postagens</a></li>
        <li><a href="/TCC/sobre.php#about">Sobre Nós</a></li>

        <li>
          <?php
          if (isset($_SESSION['usuario.nome'])) {
            echo "<strong style=\" padding-right: 15px;\">" . $_SESSION['usuario.nome'] . "</strong>";
            echo "<button style=\"background-color: #0188DF; color: white; border: 2px; 
            padding: 10px 20px; text-align: center; 
            text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; 
            cursor: pointer; border-radius: 5px; \" onclick=\"logout()\"><h3>Sair</h3></button>";
          } else { ?>
            <a href="/TCC/cadastro.php#entrar">Login</a>
          <?php } ?>
        </li>
      </ul>
    </nav>

    <div class="fas fa-bars"></div>

  </div>

  <script>
    async function logout() {
      await fetch('/TCC/core/autenticacao/logout.php');
      document.location.reload();
    }
  </script>
</header>