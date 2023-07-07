<?php

$host = "localhost";
$dbname = "gerenciador_tarefas";
$username = "root";
$pass = "";

$conexao = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$pass");

$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  