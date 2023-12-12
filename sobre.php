<!DOCTYPE html>
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

</head>

<body>


    <!-- header section starts  -->

    <?php include 'templates/header.php' ?>

    <!-- header section ends  -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="container">

            <div class="flex text-center text-md-left">

                <div class="image" data-aos="zoom-in">
                    <img src="..\TCC\img\Psyque.png" width="100%" alt="">
                </div>

                <div class="content" data-aos="fade-left">
                    <h1><span>Fique</span> Bem, <span>Fique</span> conosco.</h1>
                    <h3>Estamos Juntos!</h3>

                </div>

            </div>

        </div>

    </section>


    <!-- home section ends -->

    <!-- about section start  -->

    <section class="about" id="about">

        <div class="py-5 container">

            <div class="content" data-aos="fade-right">

                <div class="box">
                    <h3> <i class="fas fa-ambulance"></i> Missão e Valores </h3>
                    <p>Nós do Psyque Diária, temos o máximo de respeito e comprometimento com nossos leitores, quermos
                        deixar
                        aqui um ambiente para o cultivo da paz e do bem-estar, logo, queremos cultivar a saúde também.
                    </p>
                </div>

                <div class="box">
                    <h3> <i class="fas fa-procedures"></i> Quem somos?</h3>
                    <p>O Psyque Diária é formado por um grupo de alunos do IFSP Campus Birigui. Esse site
                        é simplesmente nosso TCC, colabora com o projeto ein.
                    </p>
                </div>

                <div class="box">
                    <h3> <i class="fas fa-stethoscope"></i> O que queremos?</h3>
                    <p>Queremos passar de ano e nos formar. Também queremos nosso público saudável.</p>
                </div>

            </div>

            <!-- <div class="flex text-center text-md-right">
            <div class="image" data-aos="fade-right">
                <img src="..\TCC\img\Psyque.png" width="30%" alt="">
            </div>
        </div> -->

            <!-- <div class="col-md-6 d-none d-md-block" data-aos="fade-left">
            <img src="images/about-img.png" width="100%" alt="">
        </div> -->

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

    <!-- custom js link  -->
    <script src="./js/main.js"></script>


    <script>
        AOS.init({
            duration: 1000,
            delay: 200
        });
    </script>

</body>

</html>