<?php
session_start();
 
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

require_once 'crudJson.php';
$db = new Json();

$members = $db->getRows();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>




<body>
    <div class="divact">
        <th class="actionbtn">
            <tr><button class="btn"> GRAVAR</button></tr>
            <tr>
                <form id="formid" method="post">
                    <input style="margin-left: 10px;" type="submit" id="displaybtn" name="displaybtn" value="LER">

                </form>
            </tr>
        </th>
    </div>

    <div class="">
        <div class="">
            <form method="post" action="userAction.php">
                <div class="incluir">
                    <label class="mtlef">Nome:</label> &nbsp
                    <input type="text" name="name" value="<?php echo !empty($userData['name']) ? $userData['name'] : ''; ?>" required="">
                    <input type="hidden" name="id" value="<?php echo !empty($memberData['id']) ? $memberData['id'] : ''; ?>">
                    <input type="submit" name="userSubmit" class="mtlef" value="Incluir">
                </div>
            </form>
        </div>
        <div>

        </div>
    </div>

    <div class="divresults">
        <div>
            <table>
                <thead>
                    <h3 class="titlepessoa" style="text-align: center">Pessoas</h3>
                </thead>
                <tbody class="hduser">
                    <?php if (!empty($members)) {
                        foreach ($members as $row) { ?>
                            <tr>
                                <td class="titlepessoa2"><?php echo $row['name']; ?></td>
                                <td>
                                    <a href="userAction.php?action_type=delete&id=<?php echo $row['id']; ?>"> <button>Remover</button></a>
                                    <form method="POST" action="filho.php">
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="6">Sem pessoas adicionadas</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="divresults2">
            <h3 id="messagedisplay">
            <?php
        $json_data = file_get_contents('js/pessoas.json');
        $pessoas = json_decode($json_data, true);
        ?>
        
             <?php
             echo '<pre>';
              print_r($pessoas);
              echo '</pre>'
              ?>
            </h3>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>