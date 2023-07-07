<?php

function logarUser($email, $password, $conexao){
    session_start();
    $passwordC = md5($password);

    $logar = $conexao->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $logar->bindParam(1, $email);
    $logar->bindParam(2, $passwordC);
    $logar->execute();

    if($logar->rowCount() > 0){
        $dado = $logar->fetch();

        $_SESSION['id_usuario'] = $dado['id'];
        $_SESSION['nome'] = $dado['nome'];
        $_SESSION['email'] = $dado['email'];
        $_SESSION['paassword'] = $dado['password'];

        header("location: ../resources/view/home.php");
    }
    else{
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='../resources/view/index.html';</script>";
    }
}

function deslogar(){
    session_start();
    session_destroy();
    header("location: ../resources/view/index.html");
}

function registrarUser($nome, $email, $password, $conexao){
    $passwordC = md5($password);
    
    $res = $conexao->prepare("INSERT INTO users(nome, email, password) VALUES (?, ?, ?)");
    $res->bindParam(1, $nome);
    $res->bindParam(2, $email);
    $res->bindParam(3, $passwordC);
    $res->execute();

    logarUser($email, $password, $conexao);
}

function verificaLogin(){
    if(!isset($_SESSION['id_usuario'])){
        unset($_SESSION['id_usuario']);
        
        header("location:./index.html");
    }
}