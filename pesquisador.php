<?php
    include("conexao.php");

    if (!empty($_GET['search'])) {
        $data = $_GET['search'];
        $sql = "SELECT * FROM post WHERE titulo LIKE '%{$data}%' OR autor LIKE '%{$data}%'";
    }
    else {
        $sql = "SELECT * FROM post";
        $data = '';
    }        

    if (!$sql) {
        die('<b>Query Inválida: </b>' . @mysqli_error($conexao));  
    }

    $query = $conexao -> query($sql);
?>