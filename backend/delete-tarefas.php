<?php

require_once "./conexao.php";
require_once "./funcoes.php";

$id_task = filter_input(INPUT_GET, 'id_task', FILTER_SANITIZE_NUMBER_INT);

deleteTarefa($id_task, $conexao);