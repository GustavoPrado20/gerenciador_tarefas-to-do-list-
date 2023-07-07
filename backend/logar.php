<?php

require_once "./conexao.php";
require_once "./funcoes.php";

if(isset($_POST["signIn"])){
    logarUser($_POST['email'],$_POST['password'], $conexao);
}
else{
    header("location:../resources/view/index.html");
}