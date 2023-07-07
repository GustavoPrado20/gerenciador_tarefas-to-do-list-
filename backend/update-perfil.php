<?php

require_once "./conexao.php";
require_once "./funcoes.php";

if(isset($_POST['atualizar'])){
    updatePerfil($_POST['nome'], $_POST['email'], $_POST['password'], $conexao);
}