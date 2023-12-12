<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/TCC/css/cadastro.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="/TCC/css/style.css">
</head>

<body>
    <!-- <a href="/TCC/index.html" class="logo"><span>P</span>syque<span>D</span>iária.</a> -->
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Welcome to Psyque Diária!</h2>
                <p class="description description-primary">Permaneça conectado conosco!</p>
                <p class="description description-primary">Já tem login? Aperte o botão abaixo!</p>
                <button id="signin" class="btn btn-primary">Login</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Cadastre-se</h2>
                <span id="registrar-message"></span>

                <form id="registrar-form" class="form">
                    <label class="label-input" for="nome">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" placeholder="Nome">
                    </label>

                    <label class="label-input" for="email">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" placeholder="Email">
                    </label>

                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Senha">
                    </label>

                    <button type="submit" class="btn btn-second">Cadastre-se</button>
                </form>

                <script>
                    const registrar_form = document.getElementById('registrar-form')
                    const message = document.getElementById('registrar-message')

                    registrar_form.addEventListener('submit', async (e) => {
                        e.preventDefault()

                        try {
                            // Conteúdo a ser enviado na requisição
                            const usuarioForm = new FormData()

                            // Popular com os dados informados no form
                            usuarioForm.append("nome", e.target.elements["nome"].value)
                            usuarioForm.append("email", e.target.elements["email"].value)
                            usuarioForm.append("senha", e.target.elements["senha"].value)

                            // Envio para o servidor
                            const result = await fetch(
                                '/TCC/core/repositorio/usuario/criar.php', {
                                    method: 'POST',
                                    body: usuarioForm
                                }
                            )

                            // Se o resultado não tiver código de sucesso (200), lançar exception
                            if (result.status != 200) {
                                throw await result.json()
                            }

                            console.log(await result.json())
                            message.innerHTML = 'Cadastrado com sucesso!'

                            // Aguarda por 1s antes do redirecionamento para o index
                            setTimeout(() => {
                                location.pathname = '/TCC/index.php';
                            }, 1000)

                        } catch (err) {
                            // Quando acontece algum erro, mostra a mensagem que deu erro
                            message.innerHTML = 'Erro ao cadastrar!'
                            console.warn(err)
                        }
                    })
                </script>

            </div><!-- second column -->
        </div><!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Esqueceu de fazer o cadastro!?</h2>
                <p class="description description-primary">Insira seus dados</p>
                <p class="description description-primary"> e comece sua experiência Psyque Diária!</p>
                <button id="signup" class="btn btn-primary">Cadastro</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Já tem Login? Acesse.</h2>
                <span id="login-message"></span>
                <form id="login-form" class="form">

                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" placeholder="Email">
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Senha">
                    </label>

                    <a class="password" href="#">Esqueceu sua senha?</a>
                    <button class="btn btn-second">Acesse</button>
                </form>

                <script>
                    const login_form = document.getElementById('login-form')
                    const login_message = document.getElementById('login-message')

                    login_form.addEventListener('submit', async (e) => {
                        e.preventDefault()

                        try {

                            const loginForm = new FormData()

                            loginForm.append("email", e.target.elements["email"].value)
                            loginForm.append("senha", e.target.elements["senha"].value)

                            const result = await fetch(
                                '/TCC/core/autenticacao/login.php', {
                                    method: 'POST',
                                    body: loginForm
                                }
                            )

                            const response = await result.json()

                            if (!response) {
                                throw 'Usuário não encontrado'
                            }

                            login_message.innerHTML = 'Login com sucesso!'

                            setTimeout(() => {
                                location.pathname = '/TCC/index.php';
                            }, 1000)

                        } catch (err) {
                            login_message.innerHTML = 'Erro ao realizar login!'
                            console.warn(err)
                        }
                    })
                </script>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>

    <script>
        var btnSignin = document.querySelector("#signin");
        var btnSignup = document.querySelector("#signup");

        var body = document.querySelector("body");


        btnSignin.addEventListener("click", function() {
            body.className = "sign-in-js";
        });

        btnSignup.addEventListener("click", function() {
            body.className = "sign-up-js";
        })
    </script>
</body>

</html>