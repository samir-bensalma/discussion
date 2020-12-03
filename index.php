<?php
    session_start();
    require_once("config.php");
    require_once("function.php");

    if (isset($_SESSION['login'])) {
        $conecter = '<div><a href="discussion.php">Discussion</a></div>
                        <div><a href="profil.php">Mon profil</a></div>';
        
    }else $conecter = '<div><a href="inscription.php">inscrirption</a></div>
                        <div><a href="connexion.php">Connexion</a></div>';
    
    if (isset($_SESSION['login'])) {
        $user = $_SESSION['login'];
        $bienvenue = '<p>Re-Bonjour <span style="text-transform: uppercase;"><b>'. $user. '</b></span><br> vos amis vous attend <br> allez y les rejoins.</p>';

    }else $bienvenue = '<p>Bienvenue sur notre site de chat, <br> Avec CHATIME, partagez et restez en <br> contact avec votre entourage.</p>';
    
    if (isset($_SESSION['login'])) {
        $button = '<button><a href="discussion.php">Discuter</a></button>';

    }else $button = '<button><a href="inscription.php">Inscrivez-vous</a></button>';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Accueil | CHATIME</title>
</head>

<body>

    <header class="header">
        <h2>CHATIME</h2>
        <nav>
            <div><a href=""><u><b>Accueil</b></u></a></div>
            <?php echo $conecter ?>
        </nav>
    </header>
    <main class="home">
        <section>
            <div>
                <h1>CHATIME</h1>
                <?php echo $bienvenue;
                        echo $button;
                ?>
            </div>
            <div>
                <img src="image.png" alt="Photo">
            </div>
        </section>
    </main>
    <footer>
        <p></p>
    </footer>
</body>

</html>