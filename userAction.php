<?php
session_start();

require_once 'crudJson.php';
$db = new Json();

// Definir URL de redirecionamento padrão
$redirectURL = 'index.php';

if (isset($_POST['userSubmit'])) {

    $id = $_POST['id'];
    $name = trim(strip_tags($_POST['name']));

    $id_str = '';
    if (!empty($id)) {
        $id_str = '?id=' . $id;
    }

    // Dados do formulário enviado
    $userData = array(
        'id' => $id,
        'name' => $name,
        'filho' => $filho = array(
        )
    );

    // Armazena o valor do campo enviado na sessão
    $sessData['userData'] = $userData;

    //Envia os dados do formulário 
    if (empty($errorMsg)) {
        if (empty($_POST['id'])) {

            $insert = $db->insert($userData);
            if ($insert) {
                // Remove o valor dos campos enviados da sessão
                unset($sessData['userData']);
            } else {

                //Definir URL de redirecionamento
                $redirectURL = 'addEdit.php' . $id_str;
            }
        }
    } else {
    //Definir URL de redirecionamento
        $redirectURL = 'addEdit.php' . $id_str;
    }

    // Armazena o status na sessão
    $_SESSION['sessData'] = $sessData;
} elseif (($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])) {

    // Excluir dados 
    $delete = $db->delete($_GET['id']);

    // Armazena o status na sessão
    $_SESSION['sessData'] = $sessData;


} 

function exibeJson(){
    return json_decode(file_get_contents(__DIR__.'/js/pessoas.json'), true);
}

header("Location:" . $redirectURL);
exit();
