<header>
  <?php session_start(); ?>

  <div class="container">

    <a href="/TCC" class="logo"><span>P</span>syque<span>D</span>iária.</a>

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
            echo "<strong>" . $_SESSION['usuario.nome'] . "</strong>";
            echo "<button onclick=\"logout()\"><small>Sair</small></button>";
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