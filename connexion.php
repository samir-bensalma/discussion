<?php
    session_start();
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
    <title>Connexion | CHATIME</title>
</head>

<body>
    <main>
        <section class="cadreInscriptoin">

            <div class="exite">
                <h1><a href="inscription.php">X</a></h1>
            </div>

            <div class="logo">
                <h1>CHATIME</h1>
                <p>CONNEXION</p>
            </div>

            <form action="" method="post" class="formInscription">
                <span class="msg_erreur">
                    <?php
                    $submit="";
                    if (isset($_POST['submit'])) {
                        $submit = $_POST['submit'];
                        connexion($_POST["user"], $_POST["password"]);
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
                    <input type="submit" name="submit" value="Valider">
                </div>
            </form>
            <div class="connexion">
                <a href="inscription.php">Vous n'êtes pas inscrit ?</a>
                <a href="index.php">Revenir a la page d'accueil</a>
            </div>
        </section>
    </main>
</body>

</html>