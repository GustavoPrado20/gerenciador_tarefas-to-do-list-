<?php

require_once "./conexao.php";
require_once "./funcoes.php";

if(isset($_POST['signUp'])){
    registrarUser($_POST['nome'], $_POST['email'], $_POST['password'], $conexao);
}
else{
    header("location:../resources/view/index.html");
}