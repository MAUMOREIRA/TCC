<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Psyque Diária</title>

  <!-- aos css file cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

  <!-- magnific popup css cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

  <!-- bootstrap cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/post-details.css">

</head>

<body>

  <?php include 'templates/header.php' ?>

  <!-- post section starts  -->

  <section class="post" id="post">

    <div class="container">

      <h1 id="post-title" class="heading"></h1>
      <div id="post-container" class="w-100"></div>

    </div>
  </section>

  <?php if (isset($_SESSION['usuario.email'])) { ?>
    <section class="review mt-5" id="review">

      <div class="container">

        <h1 class="heading"><span></span> Comentários <span></span></h1>
        <span id="comentario-message"></span>
        <form id="comentario-form">
          <textarea type="text" class="w-100 form-control" name="comentario" id="comentario" rows="3" placeholder="Adicione um comentário"></textarea>
          <div class="d-flex flex-row justify-content-end mt-3">
            <button class="btn btn-primary" type="submit">Comentar</button>
          </div>
        </form>

        <script>
          // Mesmo processo dos formulários do login
          const comentario_form = document.getElementById('comentario-form')
          const message = document.getElementById('comentario-message')

          comentario_form.addEventListener('submit', async (e) => {
            e.preventDefault()

            try {
              const [url, query] = location.href.split('?')
              const params = query ? new URLSearchParams(`${query}`) : {};
              const comentarioForm = new FormData()

              comentarioForm.append("comentario", e.target.elements["comentario"].value)
              comentarioForm.append("post_id", params.get('id'))

              const result = await fetch(
                '/TCC/core/repositorio/comentario/criar.php', {
                  method: 'POST',
                  body: comentarioForm
                }
              )

              message.innerHTML = 'Cadastrado com sucesso!'
              location.reload()
            } catch (err) {
              message.innerHTML = 'Erro ao cadastrar!'
              console.warn(err)
            }
          })
        </script>
        <div id="comments-container" class="box-container mt-3"></div>
      </div>

    </section>
  <?php } ?>

  <!-- <section class="review" id="review">

    <div class="container">

      <h1 class="heading"><span></span> Comentários <span></span></h1>

      <script>
        async function loadComments() {
          const [url, query] = location.href.split('?')
          const params = query ? new URLSearchParams(`${query}`) : {};
          const comments = await fetch(`/TCC/core/repositorio/comentario/listar.php?limit=12&post_id=${params.get('id')}`);

          const comments_container = document.querySelector("#comments-container");

          for (let comment of (await comments.json())) {

            const comment_div = document.createElement('div')

            // comment_div.className = '';
            comment_div.innerHTML = `
                    <div class="box" data-aos="fade-right">
                        <p>${comment.comentario}</p>
                        <h3>${comment['usuario.nome']}</h3>
                        <span>${comment.data_criacao}</span>
                        <img src="/TCC/img/pic-${(comment.usuario_id % 3) + 1}.png" alt="">
                    </div>`;

            comments_container.appendChild(comment_div);
          }
        }

        loadComments();
      </script>

      <div id="comments-container" class="box-container"></div>
    </div>

  </section> -->

  <!-- post section ends -->

  <?php include 'templates/footer.php' ?>

  <!-- jquery cdn link  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- magnific popup js link  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

  <!-- aos js file cdn link  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

  <script>
    AOS.init({
      duration: 1000,
      delay: 200
    });

    // Carrega o post
    async function loadPosts(id) {
      const postStream = await fetch(`/TCC/core/repositorio/post/get.php?id=${id}`);

      // Busca as divs que serão populadas com os dados
      const post_title = document.querySelector("#post-title"),
        post_container = document.querySelector("#post-container"),
        postData = await postStream.json();

      //  Popula as divs com o dado que foi carregado
      /* Apagar isso depois...
      Obs: o innerHTML vai adicionar o conteúdo da div (ou qualquer outra tag) como se fosse HTML msm. 
      Tipo, se somente adicionar dentro da tag vai ser lido como texto corrido, mas se setarmos como innerHTML
      esse conteúdo é renderizado msm. Então vc injeta um HTML nele msm que vai ser renderizado
      */ 
      post_title.innerHTML = postData.titulo
      post_container.innerHTML = postData.texto
    }

    // Faz a serialização dos parametros da url, assim conseguimos pegar cada parametro de lá
    const [url, query] = location.href.split('?')
    const params = query ? new URLSearchParams(`${query}`) : {};

    // Se não houver o parametro id, voltar para a página principal
    if (!params.has('id')) {
      location.href = '/TCC/index.php'
    } else {
      loadPosts(params.get('id'));
    }
  </script>

</body>

</html>