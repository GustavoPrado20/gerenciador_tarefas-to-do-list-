<?php
    require_once "../../backend/conexao.php";
    require_once "../../backend/funcoes.php";

    session_start();
    verificaLogin();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Gerenciador de Tarefas</title>

        <link rel="stylesheet" href="../../public/css/main.css">
        <link rel="stylesheet" href="../../public/css/header.css">
        <link rel="stylesheet" href="../../public/css/config.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <nav class="nav-bar">
                <a href="./home.php" class="logo">Gerenciador de Tarefas</a>

                <section class="mobile-menu">
                    <section class="line1"></section>
                    <section class="line2"></section>
                    <section class="line3"></section>
                </section>

                <ul class="nav-list">
                    <li>
                        <a href="./home.php">TAREFAS</a>
                    </li>

                    <li>
                        <a href="./config.php">CONFIGURAÇÕES</a>
                    </li>

                    <li>
                        <a href="../../backend/deslogar.php">LOGOUT</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <section class="perfil">
                <section class="perfil-header">
                    <h1>Configurações de Perfil</h1>
                </section>

                <section class="form-config">
                    <form action="../../backend/update-perfil.php" id="update-config" method="POST">
                        <section class="input-group">

                            <section class="input-box">
                                <Label for="nome">Nome</Label>
                                <input type="text" name="nome" placeholder="Nome" id="nome" value="<?php echo $_SESSION['nome']; ?>" require>
                                <span class='erro-validacao-nome msg-nome'></span>
                            </section>

                            <section class="input-box">
                                <Label for="password">Senha</Label>
                                <input type="password" name="password" placeholder="Senha" id="password" require>
                                <span class='erro-validacao-password msg-passwordR'></span>
                            </section>
                        
                            <section class="input-box">
                                <label for="email">Email</label>
                                <input type="text" name="email" placeholder="Email" id="email" value="<?php echo $_SESSION['email']; ?>" require>
                                <span class='erro-validacao-email msg-emailR'></span>
                            </section>  

                            <section class="input-box">
                                <Label for="password_confirmation">Confirmação de Senha</Label>
                                <input type="password" name="password" placeholder="Confirmação Senha" id="password_confirmation" require>
                                <span class='erro-validacao-password-confirmation msg-password-confirmation'></span>
                            </section>

                        </section>

                        <section class="btn-update">
                            <input type="submit" name="atualizar" value="Atualizar">
                        </section>
                    </form>
                </section>
            </section>
        </main>

        <script type="text/javascript" src="../../public/js/mobile-navbar.js"></script>
        <script type="text/javascript" src="../../public/js/config-validacao.js"></script>
    </body>
</html>