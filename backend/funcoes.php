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
        $_SESSION['password'] = $dado['password'];

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

function listarTarefas($conexao){

    $listTask = $conexao->prepare("SELECT * FROM tarefas WHERE id_user = ? ORDER BY data_criacao");
    $listTask->bindParam(1, $_SESSION['id_usuario']);
    $listTask->execute();
    
    if($listTask->rowCount() > 0){
        $dadoTask = $listTask->fetchAll();

        return $dadoTask;
    }
}

function adicionarTarefas($titulo, $descricao, $status, $conexao){
    session_start();
    $addTask = $conexao->prepare("INSERT INTO tarefas(id_user, titulo, descricao, status) VALUES (?, ?, ?, ?)");
    $addTask->bindParam(1, $_SESSION['id_usuario']);
    $addTask->bindParam(2, $titulo);
    $addTask->bindParam(3, $descricao);
    $addTask->bindParam(4, $status);
    $addTask->execute();

    header("location:../resources/view/home.php");
}

function deleteTarefa($id_tarefa, $conexao){
    $id = (int)$id_tarefa;
    $deleteTask = $conexao->prepare("DELETE FROM tarefas WHERE id = ?");
    $deleteTask->bindParam(1, $id);
    $deleteTask->execute();

    header("location:../resources/view/home.php");
}

function updatePerfil($nome, $email, $password, $conexao){
    session_start();
    $passwordC = md5($password);
    $updatePer = $conexao->prepare("UPDATE users SET nome = ?, email = ?, password = ? where id = ?");
    $updatePer->bindParam(1, $nome);
    $updatePer->bindParam(2, $email);
    $updatePer->bindParam(3, $passwordC);
    $updatePer->bindParam(4, $_SESSION['id_usuario']);
    $updatePer->execute();
    
    logarUser($email, $password, $conexao);
}

function buscarTarefa($titulo, $status, $conexao){
    if(empty($status)){
        $listTask = $conexao->prepare('SELECT * FROM tarefas WHERE id_user = ? AND titulo LIKE ? ORDER BY data_criacao');
        $listTask->bindParam(1, $_SESSION['id_usuario']);
        $listTask->bindParam(2, $titulo);
        $listTask->execute();

        if($listTask->rowCount() > 0){
            $dadoTask = $listTask->fetchAll();
    
            return $dadoTask;
        }
    }
    else{
        $listTask = $conexao->prepare('SELECT * FROM tarefas WHERE id_user = ? AND titulo LIKE ? OR status = ? ORDER BY data_criacao');
        $listTask->bindParam(1, $_SESSION['id_usuario']);
        $listTask->bindParam(2, $titulo);
        $listTask->bindParam(3, $status);
        $listTask->execute(); 

        if($listTask->rowCount() > 0){
            $dadoTask = $listTask->fetchAll();
    
            return $dadoTask;
        }
    }

}