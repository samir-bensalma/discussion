<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header("Location: discussion.php");
    }
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
    <title>Profil | CHATIME</title>
</head>

<body>
    <main class="cadreProfil">
        <div class="logoProfil">
            <h1>CHATIME</h1>
            <p>Profil</p>
        </div>
        <section>
            <div class="exite">
                <h1><a href="discussion.php">X</a></h1>
            </div>

            <div class="text">
                <p>Modifier mon username</p>
            </div>

            <form action="" method="post" class="formInscription">
                <span class="msg_erreur">
                    <?php
                    prfofilChangUser($_POST["newUser"], $_POST["password"]);
                ?>
                </span>
                <div>
                    <label for="newUser"></label>
                    <input type="text" name="newUser" id="newUser" placeholder="Nouveau username">
                </div>
                <div>
                    <label for="password"></label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                </div>
                <div>
                    <input type="submit" name="submitNewUser" value="Valider">
                </div>
            </form>
        </section>

        <div class="trait"></div>

        <section>
            <div class="text">
                <p>Modifier mon mot de passe</p>
            </div>

            <form action="" method="post" class="formInscription">
                <span class="msg_erreur">
                    <?php
                    prfofilChangPass($_POST["oldPass"], $_POST["newPass"], $_POST["cNewPass"]);
                ?>
                </span>
                <div>
                    <label for="oldPssw"></label>
                    <input type="password" name="oldPass" id="oldPass" placeholder="Ancien mot de passe">
                </div>
                <div>
                    <label for="newPass"></label>
                    <input type="password" name="newPass" id="newPass" placeholder="Nouveau mot de passe">
                </div>
                <div>
                    <label for="cNewPass"></label>
                    <input type="password" name="cNewPass" id="cNewPass"
                        placeholder="Confirmer le nouveau mot de passe">
                </div>
                <div>
                    <input type="submit" name="submitNewPass" value="Valider">
                </div>
            </form>
        </section>
    </main>
</body>

</html>