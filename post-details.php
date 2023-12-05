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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/post-details.css">

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

    async function loadPosts(id) {
      const postStream = await fetch(`/TCC/core/repositorio/post/get.php?id=${id}`);

      const post_title = document.querySelector("#post-title"),
        post_container = document.querySelector("#post-container"),
        postData = await postStream.json();

      post_title.innerHTML = postData.titulo
      post_container.innerHTML = postData.texto
    }

    const [url, query] = location.href.split('?')
    const params = query ? new URLSearchParams(`${query}`) : {};

    if (!params.has('id')) {
      location.href = '/TCC/index.php'
    } else {
      loadPosts(params.get('id'));
    }
  </script>

</body>

</html>