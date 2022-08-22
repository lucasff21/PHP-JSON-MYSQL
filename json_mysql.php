<?php
include("./database/conexao.php");

$pessoas1 = "js/pessoas.json";

$dados = file_get_contents($pessoas1);

$array = json_decode($dados, true);

$sqldel = "TRUNCATE TABLE pessoas";
$result=$connect->query($sqldel);

foreach($array as $row)
    {
        $sql = "INSERT INTO pessoas (id, nome) VALUES ('".$row["id"]."', '".$row["name"]."')";

        mysqli_query($connect, $sql);
    }

