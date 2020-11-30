<?php

try{
    $db = new PDO("mysql:host=localhost;dbname=discussion","root","");
}
catch(exception $e){
    die('Erreur'. $e->getMessage());
}

function register($login, $password, $cpassword)
{       $db = new PDO("mysql:host=localhost;dbname=discussion","root","");
    if (isset($_POST["submit"])) {
        $msg = array();
        // Pour verifier si le username existe deja dans la base de donnée
        $existe = $db->prepare("SELECT login FROM utilisateurs WHERE login = '$login'");
        $existe->execute();
        $existe = $db->prepare("SELECT FOUND_ROWS()");
        $existe->execute();
        $row_count = $existe->fetchColumn();
        // verifier si l'utilisateur a rempli tous les champs
        if (!empty($login) && !empty($password) && !empty($cpassword)) {
        } else array_push($msg, "Merci de remplir tous les champs<br>");
        // si le user est deja utiliser affichage d'un message d'erreur
        if ($row_count == 0) {
        } else array_push($msg, "Le user que vous avez utiliser existe deja<br>");
        // si les mot de passe sont identique passer a l'etape suivante
        if ($password == $cpassword) {
        } else array_push($msg, "Les mots de passe ne sont pas identiques<br>");
        // si zéro ereur donc envoyer les informations dans la base de donnée
        $count = count($msg);
        if ($count == 0) {
            $crypt_pass = password_hash($password, PASSWORD_BCRYPT);
            $insert = $db->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
            $insert->execute([$login, $crypt_pass]);
            array_push($msg, "vous avez bien ete enregistrer<br>");
        }
        // pour afficher les message
        foreach ($msg as $msg_show) {
            echo $msg_show;
        }
    }
}
function connexion($login,$password) {

    if(!empty(trim($login)) AND !empty(trim($password))){
        $db = new PDO("mysql:host=localhost;dbname=discussion","root","");
        $sth = $db -> prepare("SELECT id FROM utilisateurs WHERE login ='$login'");
        $sth-> setFetchMode(PDO::FETCH_ASSOC);
        $sth -> execute();
        $row = $sth -> fetch();
        $_SESSION['id'] = $row['id'];
        $count = $sth -> rowCount();
            if ($count > 0){
                $sth = $db -> prepare("SELECT password FROM utilisateurs WHERE login ='$login'");
                $sth-> setFetchMode(PDO::FETCH_ASSOC);
                $sth -> execute();
                $row = $sth -> fetch();

                if(password_verify($password,$row['password'])) {
                    $_SESSION['login'] = $login;
                    echo "Bienvenue" . " " . $_SESSION['login'] . " " . "vous êtes connecté" . "<br>";
                    echo "Vous allez être automatiquement redirigé vers l'accueil";
                    header('refresh:3;url=index.php');
                } else echo "Mot de passe incorrect";
    } else echo "Login inconnu";
} else echo "Merci de compléter le login et le mot de passe";
}

function login($login)
{
    if (isset($login)) {
        $db = new PDO("mysql:host=localhost;dbname=discussion", "root", "");
        $sth = $db->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $sth->bindValue(1, $login);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        // Requete pour vérifier si le login existe déjà dans la base de données
        $count = $sth->rowCount();

        if ($count == 0) {
            //Si le résultat est égal à 0 et que donc le login  n'existe pas, ok pour update de la BDD
            $sth = $db->prepare("UPDATE utilisateurs SET login='$login' WHERE id = ?");
            $sth->bindValue(1, $_SESSION['id']);
            $sth->execute();
            $_SESSION['login'] = $login;
            //Changement de la variable de session login avec le nouveau login
            echo "Votre profil a été mis à jour" . "<br>";
            echo "Votre nouveau login est" . " " . "$login";
        }
        else echo "Le login existe déjà";
    }
}

function password($password,$cpassword){
        if (!empty(trim($password)) && !empty(trim($cpassword))){
            if ($password == $cpassword){
                // vérification que les champs ne sont pas vides et que les deux mots de passe sn
                $db = new PDO("mysql:host=localhost;dbname=discussion", "root", "");
                $hash_password = password_hash($password, PASSWORD_BCRYPT);
                $sth = $db->prepare("UPDATE utilisateurs SET password='$hash_password' WHERE id = ?");
                $sth->bindValue(1, $_SESSION['id']);
                $sth->execute();
                echo "Votre mot de passe a bien été modifié";
            } else echo "Les deux mots de passe ne sont pas identiques";
        }
}

?>
