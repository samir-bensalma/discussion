<?php

    require_once("config.php");
    require_once("function.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Inscription | CHATIME</title>
</head>

<body>
    <main>
        <section class="cadreInscriptoin">

            <div class="exite">
                <h1><a href="index.php">X</a></h1>
            </div>

            <div class="logo">
                <h1>CHATIME</h1>
                <p>INSCRIPTION</p>
            </div>
            
            <form action="" method="post" class="formInscription">
                <span class="msg_erreur">
                    <?php
                    if (isset($_POST['submit'])) {
                        inscription(trim($_POST["user"]), trim($_POST["password"]), trim($_POST["cpassword"]));
                    }
                    ?>
                </span>
                <div>
                    <label for="user"></label>
                    <input type="text" name="user" id="user" placeholder="Username">
                </div>

                <div>
                    <label for="password"></label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                </div>
                <div>
                    <label for="cpassword"></label>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirmer le mot de passe">
                </div>
                <div>
                    <input type="submit" name="submit" value="Valider">
                </div>
            </form>
            <div class="connexion">
                <a href="connexion.php">Déjà un membre ?</a>
                <a href="index.php">Revenir a la page d'accueil</a>
            </div>
        </section>
    </main>
</body>

</html>