<?php


// DEBUT FUNCTION POUR LA PAGE INSCRIPTION 
function inscription($user, $password, $cpassword){
    session_start();
    if (isset($_SESSION['login'])) {
        header("Location: discussion.php");
    }
    include("config.php");
    if (isset($_POST["submit"])) {
        $msg = array();
        // Pour verifier si le username existe deja dans la base de donnée
        $existe = $conn->prepare("SELECT login FROM utilisateurs WHERE login = :user"); 
        $existe->execute(['user' => $user]);
        // $existe = $existe -> fetch(PDO::FETCH_ASSOC);
        $existe = $existe->fetch(PDO::FETCH_ASSOC);;
        $existe = $existe['login'];
        // verifier si l'utilisateur a rempli tous les champs
        if (!empty($user) && !empty($password) && !empty($cpassword)) {
        }else array_push($msg, "Merci de remplir tous les champs<br>");
        // si le user est deja utiliser affichage d'un message d'erreur
        if ($existe !== $user) {
        }else array_push($msg, "Le user que vous avez utiliser existe deja<br>");
        // si les mot de passe sont identique passer a l'etape suivante
        if ($password == $cpassword) {
        }else array_push($msg, "Les mots de passe ne sont pas identique<br>");
        // si zéro ereur donc envoyer les informations dans la base de donnée
        $count = count($msg);
        if ($count == 0) {
            $crypt_pass = password_hash($password, PASSWORD_BCRYPT);
            $insert = $conn -> prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
            $insert -> execute([$user, $crypt_pass]);
            $_SESSION["login"] = $user;
            header("Location: discussion.php");
        }
        // pour afficher les message
        foreach ($msg as $msg_show) {
            echo $msg_show;
        }
    }
}
// FIN FUNCTION POUR LA PAGE INSCRIPTION 

    //////////////////////////////////////////////////

// DEBUT FUNCTION POUR LA PAGE CONNEXION 
function connexion($user, $password)
{
    if (isset($_SESSION['login'])) {
        header("Location: discussion.php");
    }
    include("config.php");

        // crée un tableau pour stocker les messages d'erreur
        $msg = array();
        // decrypter le mot de passe
        $info = $conn->prepare(" SELECT login, password FROM utilisateurs WHERE login = :user ");
        $info->execute(['user' => $user]);
        $info = $info -> fetch(PDO::FETCH_ASSOC);
        $crypted=$info['password'];
        $login=$info['login'];
        // si le mdp crypter est == le mdp entrer cela est = 1 sinon = 0
        $decrypted = password_verify($password, $crypted);
        // verifeir si tous les champs son remplis
        if (!empty(trim($user)) && !empty(trim($password))) {
            // si le user et le mot de passe entrer sont correct creation d'une session
            if ($login === $user && $decrypted == true) {
                $_SESSION['login'] = $user;
                header("Location: discussion.php");
            } else array_push($msg, "le username ou le mot de passe n'est pas correct ");
        } else array_push($msg, "Merci de remplir tous les champs");
        // pour afficher les message d'erreurs
        foreach ($msg as $msg_erreur) {
            echo $msg_erreur;
        }
}
// FIN FUNCTION POUR LA PAGE CONNEXION 

    //////////////////////////////////////////////////

// DEBUT FUNCTION POUR LA PAGE PROFIL USERNAME 
function prfofilChangUser($user, $password){
    $session = $_SESSION['login'];
    include("config.php");
    
    if (isset($_POST["submitNewUser"])) {
        // crée un tableau pour stocker les messages d'erreur
        $msg = array(); 
        // decrypter le mot de passe
        $info = $conn -> prepare(" SELECT * FROM utilisateurs WHERE login = :session ");
        $info -> execute(['session' => $session]);
        $info = $info -> fetch(PDO::FETCH_ASSOC);
        $crypted = $info['password']; // mot de passe crypté
        // si le mdp crypter est == le mdp entrer cela est = 1 sinon = 0
        $decrypted = password_verify($password, $crypted);
        // verifeir si tous les champs son remplis
        if (!empty($user)) {
        }else array_push($msg, "merci de saisir un username<br>");
        // si le user entrer est different que celui utiliser
        if ($user !== $session) {
            // si le user entrer n'existe pas
            $infou = $conn -> prepare(" SELECT * FROM utilisateurs WHERE login = '$user' ");
            $infou -> execute();
            $infou= $infou -> fetch(PDO::FETCH_ASSOC);
            $login = $infou['login'];

            if ($login !== $user) {
            }else array_push($msg, "le username existe déjà :(<br>");
        }else array_push($msg, "vous devez utiliser un autre username que $session<br>");
        

        if (!empty($password)) {
            if ($decrypted == true) {
            }else array_push($msg, "Le mot de passe n'est pas correct<br>");
        }else array_push($msg, "merci de saisir votre mot de passe<br>");

        $count = count($msg);
        if ($count == 0) {
            $update = $conn -> prepare("UPDATE utilisateurs SET login = :login WHERE login = :session ");
            $update -> bindParam("login", $user);
            $update -> bindParam("session", $session);
            $update -> execute();
            $_SESSION['login'] = $user;
            array_push($msg, "vous avez bien modifié votre username à $user<br>");
        }
        // pour afficher les message
        foreach ($msg as $msg_show) {
            echo $msg_show;
        }
    }
}
// FIN FUNCTION POUR LA PAGE PROFIL USERNAME 

    //////////////////////////////////////////////////

// DEBUT FUNCTION POUR LA PAGE PROFIL PASSWORD 
function prfofilChangPass($oldPass, $password, $cpassword){
    $session = $_SESSION['login'];
    include("config.php");
    if (isset($_POST["submitNewPass"])) {
        $msg = array();
        // decrypter le mot de passe
        $info = $conn -> prepare(" SELECT * FROM utilisateurs WHERE login = :session ");
        $info -> execute(['session' => $session]);
        $info = $info -> fetch(PDO::FETCH_ASSOC);
        $crypted = $info['password']; // mot de passe crypté
        // si le mdp crypter est == le mdp entrer cela est = 1 sinon = 0
        $decrypted = password_verify($oldPass, $crypted);
        // verifier si l'utilisateur a rempli tous les champs
        if (!empty($oldPass)) {
            if ($decrypted == true) {
            }else array_push($msg, "Le mot de passe saisi n'est pas correce<br>");
        }else array_push($msg, "Merci de saisir l'ancien mot de passe<br>");
        // verifier si l'utilisateur a rempli tous les champs
        if (!empty($password)) {
            if ($password != $oldPass) {
            }else array_push($msg, "vous devez utilisez un autre mot de passe !<br>");
        }else array_push($msg, "Merci de saisir le nouveau mot de passe<br>");
        // verifier si l'utilisateur a rempli tous les champs
        if (!empty($cpassword)) {
            if ($password == $cpassword) {
            }else array_push($msg, "La confirmation du mot de passe n'est pas correct<br>");
        }else array_push($msg, "Merci de confirmer le mot de passe<br>");
        // si zéro ereur donc envoyer les informations dans la base de donnée
        $count = count($msg);
        if ($count == 0) {
            $crypt_pass = password_hash($password, PASSWORD_BCRYPT);
            $update = $conn -> prepare("UPDATE utilisateurs SET password = :password WHERE login = :session ");
            $update -> bindParam("password", $crypt_pass);
            $update -> bindParam("session", $session);
            $update -> execute();
            array_push($msg, "vous avez bien modifier le mot de passe<br>");
        }
        // pour afficher les message
        foreach ($msg as $msg_show) {
            echo $msg_show;
        }
    }
}
// FIN FUNCTION POUR LA PAGE PROFIL PASSWORD 

    //////////////////////////////////////////////////

// DEBUT FUNCTION POUR LA PAGE DISCUSSION
function discussion($text, $submit)
{
    $db = new PDO("mysql:host=localhost;dbname=discussion", "root", "");
    $date = date('Y-m-d H:i:s');
    $login = $_SESSION['login'];
    $sth = $db->prepare("SELECT id FROM utilisateurs WHERE login ='$login'");
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute();
    $row = $sth->fetch();
    $id_utilisateur = $row['id'];
    var_dump($row['id']);

        if (isset($submit)) {
            if (!empty(trim($text))) {

                $query = $db->prepare("INSERT INTO messages (message,id_utilisateur,date) values (:message,:id_utilisateur,:date)");
                $query->bindParam(':message', $text);
                $query->bindParam(':id_utilisateur', $id_utilisateur);
                $query->bindParam(':date', $date);
                $query->execute();
                header('location:discussion.php');

            }else echo "merci de compléter le champ";
        }else echo "Compléter votre message et appuyer sur valider";
}
    //////////////////////////////////////////////////

   function envoyer($send,$chat){
    if (isset($send)) {
        if (!empty($chat)) {
            include("config.php");
            $id_utilisateur = $conn -> prepare(" SELECT * FROM  utilisateurs WHERE login = :session");
            $id_utilisateur -> bindParam('session', $session);
            $id_utilisateur -> execute();
            $id_utilisateur = $id_utilisateur -> fetch(PDO::FETCH_ASSOC);
            $id_utilisateur = $id_utilisateur['id'];

            $date = date("Y-m-d H:i:s"); 
            $sendMessage = $conn -> prepare("INSERT INTO messages (message, id_utilisateur, date) VALUES (:message, :id_utilisateur, :date) ");
            $sendMessage -> bindParam('message', $chat);
            $sendMessage -> bindParam('date', $date);
            $sendMessage -> bindParam('id_utilisateur', $id_utilisateur);
            $sendMessage -> execute();
            header('refresh:0');
        } echo "pb";
    }
}
    //////////////////////////////////////////////////

function logout()
{
    session_unset();
    header('Location: connexion.php');
}

    //////////////////////////////////////////////////

function afficher()
{
    if ($_SESSION['login']) {
        include("config.php");
        $requete = $conn->prepare("SELECT message, login, date FROM messages JOIN utilisateurs ON messages.id_utilisateur  = utilisateurs.id ORDER BY date DESC ");
        $requete->execute();
        foreach ($requete as $message) {
            echo $message['message'] . "<br>";
            echo $message['date'] . "<br>";
            echo $message['login'] . "<br>";
        }
    }
}

?>