<?php
    session_start();
    require_once("config.php");
    require_once("function.php");
    if (isset($_POST['send'])){
        header('refresh:0');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Discussion | CHATIME</title>
</head>

<body>
    <main>
        <section class="cadreChat">

            <div class="info">
                <div>
                    <h1><u>CHATIME</u></h1>
                    <p>
                        <?php 
                            echo "Bienvenue <b><span style=\"text-transform: uppercase;\">" .$_SESSION['login']."</span></b> sur la discussion";
                        ?>
                    </p>
                </div>

                <div>
                    <a href="index.php">Page d'accueil</a>
                    <br>
                    <br>
                    <a href="profil.php">Modifier mon profil</a>
                </div>
                
                <div>
                    <form action="" method="post">
                        <input type="submit" name="logout" value="Déconnexion">
                    </form>
                </div>
            </div>

            <div>
                <div class="chat">
                    <div>
                        <!-- a mettre sur la function -->
                        <?php
                        afficher();
                        if (isset($_POST['send'])) {
                            discussion($_POST['chat'], $_POST['send']);
                        }
                        if (isset($_POST['logout'])){
                            logout();
                        }
                        ?>
                    </div>
                </div>

                <form action="" method="post" class="message">
                    <textarea name="chat" id="chat" cols="30" rows="10" placeholder="écrivez un message"></textarea>
                    <input type="submit" name="send" value="ENVOYER">
                </form>
            </div>
        </section>
    </main>
</body>

</html>