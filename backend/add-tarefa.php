<?php

require_once "./conexao.php";
require_once "./funcoes.php";

if(isset($_GET['adicionar'])){
    adicionarTarefas($_GET['titulo'], $_GET['descricao'], $_GET['status'], $conexao);
}