<?php
include("./database/conexao.php");

$sql = "SELECT * FROM pessoas";
$result = mysqli_query($connect, $sql);

$json_array = array();



while($row = mysqli_fetch_assoc($result))
{
    $json_array[] = $row;

}

echo '<pre>';
     print_r($json_array); 
echo '</pre>';
?>
