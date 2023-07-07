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
        <link rel="stylesheet" href="../../public/css/tasks.css">
        <link rel="stylesheet" href="../../public/css/modals.css">
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
            <section class="table">
                <section class="table-header">
                    <h1>Tarefas de Gustavo Prado</h1>
                    <section>
                        <button class="buscar-tarefa" id="filtro_tarefa" href = "#"><i class="fas fa-search iSearch"></i></button>
                        <button class="add-tarefa" id="add_tarefa" href = "#">+ Add New</button>
                    </section>
                </section>

                <section class="table-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Descrição</th>
                                <th>Criada em</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Correr</td>
                                <td>Correr 5 H por dia</td>
                                <td>20/08/2003</td>
                                <td>Em andamento</td>
                                <td>
                                    <button id="update-tarefa" href = "#"><i class="fa-solid fa-pen-to-square"></i></button>

                                    <button><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </main>

        <!-- Modal ADD TASK -->
        <section id="fade" class="hide"></section>

        <section id="modal-tarefa" class="hide modal">
            <section class="header-modal">
                <h2>Adicionar Tarefa</h2>
                <button class="fechar-modal" id="fecha-modal-tarefa"><i class="fa-solid fa-xmark"></i></button>
            </section>

            <section class="modal-body">
                <section class="main-add-tarefa">
                    <form action="#" name="add-task" method="GET" class="form-add">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" placeholder="Titulo da Tarefa">

                        <label for="descrição">Descrição</label>
                        <textarea id="descrição" name="descricao"  placeholder="Descrição da tarefa"></textarea>

                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="completo">Completo</option>
                            <option value="andamento">Em Andamento</option>
                            <option value="parado">Encerrado</option>
                        </select>

                        <input type="submit" name="adicionar" value="Adicionar">
                    </form>
                </section>
            </section>
        </section>

        <!-- Modal Busca Tarefa -->
        <section id="modal-busca-tarefa" class="hide modal">
            <section class="header-modal">
                <h2>Filtrar Tarefa</h2>
                <button class="fechar-modal" id="fecha-modal-busca"><i class="fa-solid fa-xmark"></i></button>
            </section>

            <section class="modal-body-busca">
                <section class="main-busca">
                    <form action="#" name="busca-task" method="GET" class="form-add">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" placeholder="Titulo da Tarefa">

                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value=""></option>
                            <option value="completo">Completo</option>
                            <option value="andamento">Em Andamento</option>
                            <option value="parado">Encerrado</option>
                        </select>

                        <input type="submit" name="buscar" value="Buscar">
                    </form>
                </section>
            </section>
        </section>

        <!-- Modal atualizar Tarefa -->
        <section id="modal-update-tarefa" class="hide modal">
            <section class="header-modal">
                <h2>Atualizar Tarefa</h2>
                <button class="fechar-modal" id="fecha-modal-update"><i class="fa-solid fa-xmark"></i></button>
            </section>

            <section class="modal-body-busca">
                <section class="main-busca">
                    <form action="#" name="busca-task" method="GET" class="form-add">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" placeholder="Titulo da Tarefa" value="">

                        <label for="descrição">Descrição</label>
                        <textarea id="descrição" name="descricao"  placeholder="Descrição da tarefa"></textarea>

                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="completo">Completo</option>
                            <option value="andamento">Em Andamento</option>
                            <option value="parado">Encerrado</option>
                        </select>

                        <input type="submit" name="atualizar" value="Atualizar">
                    </form>
                </section>
            </section>
        </section>

        <script type="text/javascript" src="../../public/js/mobile-navbar.js"></script>
        <script type="text/javascript" src="../../public/js/modal-add-tarefa.js"></script>
        <script type="text/javascript" src="../../public/js/modal-filtro-tarefa.js"></script>
        <script type="text/javascript" src="../../public/js/modal-update-tarefa.js"></script>
    </body>
</html>