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
    <link rel="stylesheet" href="/TCC/css/style.css">

</head>

<body>

    <?php include 'templates/header.php' ?>

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="container">

            <div class="flex text-center text-md-left">

                <div class="image" data-aos="zoom-in">
                    <img src="/TCC/img/Psyque.png" width="100%" alt="">
                </div>

                <div class="content" data-aos="fade-left">
                    <h1><span>Fique</span> Bem, <span>Fique</span> conosco.</h1>
                    <h3>Estamos Juntos!</h3>
                    <a href="/TCC/sobre.php"><button class="button">Saiba Mais</button></a>
                </div>

            </div>

        </div>

    </section>

    <section class="facility" id="facility">

        <div class="container">

            <h1 class="heading">Vídeos <span>&</span> Podcasts</h1>

            <script>
                // Função para o carregamento dos vídeos
                async function loadVideos() {
                    const videos = await fetch('/TCC/core/repositorio/video/listar.php?limit=6');

                    const videos_container = document.querySelector("#videos-container");

                    //  Para cada vídeo retornado, adicionar na tela
                    for (let video of (await videos.json())) {

                        const video_div = document.createElement('div')
                        video_div.innerHTML = `
                            <div class="box" data-aos="zoom-in">
                                <iframe width="300" height="200" src="${video.link}" frameborder="0" allow="autoplay; picture-in-picture; web-share"></iframe>
                            </div>`;

                        videos_container.appendChild(video_div);
                    }
                }

                // Carregar os vídeos
                loadVideos();
            </script>

            <!-- Div a ser populada com o conteúdo dos vídeos -->
            <div id="videos-container" class="box-container"></div>

        </div>

    </section>

    <!-- facility section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <div class="container">

            <h1 class="heading"><span></span> Comentários <span></span></h1>

            <script>
                async function loadComments() {
                    const comments = await fetch('/TCC/core/repositorio/comentario/listar.php?limit=4');

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

    </section>

    <!-- review section ends  -->

    <!-- counter section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <div class="container">

            <div class="row justify-content-center">

                <h1 class="heading"><span></span> Fale com nossos Especialistas <span></span></h1>

                <div class="col-md-10" data-aos="flip-down">

                    <form id="contact-form">

                        <div class="inputBox">
                            <input type="text" name="nome" id="nome" placeholder="Nome Completo">
                            <input type="number" name="celular" id="celular" placeholder="Celular">
                        </div>

                        <div class="inputBox">
                            <input type="email" name="email" id="email" placeholder="email">
                            <select name="horario" id="horario">
                                <option value="" disabled selected>Hora de resposta</option>
                                <option value="09-11 am">09:11 </option>
                                <option value="11-03 pm">11:03 </option>
                                <option value="03-06 pm">18:06 </option>
                                <option value="06-09 pm">20:00 </option>
                            </select>
                        </div>

                        <textarea name="mensagem" id="mensagem" cols="30" rows="10" placeholder="Sua Mensagem"></textarea>

                        <input type="submit" value="Enviar" class="button">

                    </form>

                    <script>
                        const contact_form = document.getElementById('contact-form')

                        contact_form.addEventListener('submit', async (e) => {
                            e.preventDefault()

                            try {
                                // Criar link e clicar para abrir o email
                                const anchorTag = document.createElement('a');
                                anchorTag.href = `mailto:${document.getElementById('carmen.correa@ifsp.edu.br').value}?body=${document.getElementById('mensagem').value}&subject=PsyqueDiária`;
                                anchorTag.target = '_blank';
                                anchorTag.click();

                            } catch (err) {
                                console.warn(err)
                            }
                        })
                    </script>
                </div>

            </div>
        </div>

    </section>

    <!-- contact section ends -->

    <!-- post section starts  -->

    <section class="post" id="post">

        <div class="container">

            <h1 class="heading"><span></span>Postagens<span></span></h1>

            <script>
                async function loadPosts() {
                    const posts = await fetch('/TCC/core/repositorio/post/listar.php?limit=4');

                    const posts_container = document.querySelector("#posts-container");

                    for (let post of (await posts.json())) {

                        const post_div = document.createElement('div')

                        // post_div.className = '';
                        post_div.innerHTML = `
                            <div class="box" data-aos="fade-left">
                                <img src="/TCC/${post.link_imagem}" alt="">
                                <div class="content">
                                    <span>${post.data_postagem}</span>
                                    <a href="/TCC/post-details.php?id=${post.id}">
                                        <h3>${post.titulo}</h3>
                                    </a>
                                    <a href="/TCC/post-details.php?id=${post.id}">
                                        <button class="button">Saiba Mais</button>
                                    </a>
                                </div>
                            </div>`;

                        posts_container.appendChild(post_div);
                    }
                }

                loadPosts();
            </script>

            <div id="posts-container" class="box-container"></div>

        </div>

    </section>

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
    </script>

</body>

</html>