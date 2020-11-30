<?php
session_start();
require_once('function.php');
require_once('header.php');
var_dump($_SESSION['login']);
var_dump($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body>

<form action="" method="post">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="checklogin" value="checklogin" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Login
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="checkmdp" value="" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Mot de passe
        </label>
    </div>
    <button type="submit" name="submit_new_login" class="btn btn-primary">Valider</button>
</form>
    <?php

    //Si l'utilisateur check le choix de modifier le login
    if (isset($_POST['checklogin'])){?>
        <form action="" method="post">
        <div class="form-group">
        <label for="login">Nouveau login</label>
        <input type="text" class="form-control" name="new_login">
            <button type="submit" name="submit_new_login" value="valider">Valider</button>
        </div>
        </form>
            <?php }

            if (isset($_POST['new_login'])) {
                login($_POST['new_login']); // Appel de la fonction login
            }

    // Si l'utilisateur check le choix de modfier le mot de passe
    if (isset($_POST['checkmdp'])){?>
    <form action="" method="post">
        <div class="form-group">
            <label for="Nouveau mot de passe">Nouveau mot de passe</label>
            <input type="password" class="form-control" name="new_password">
            <label for="Nouveau mot de passe">Confirmez le nouveau mot de passe</label>
            <input type="password" class="form-control" name="confirm_new_password">
            <button type="submit" name="submit_new_password" value="valider">Valider</button>
        </div>
    </form>
        <?php }

        if (isset($_POST['new_password'])) {
            password($_POST['new_password'], $_POST['confirm_new_password']); // Appel de la fonction password
        }
        ?>

</body>
<?php
require_once('footer.php')
?>
</html>