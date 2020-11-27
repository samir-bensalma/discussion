

<?php

session_start();
require_once('config.php');
require_once('function.php');
require_once('header footer.php');


var_dump($_SESSION['login']);
var_dump($_SESSION['id']);

if (isset($_POST['submit'])) {
    profil($_POST['login'], $_POST['password'], $_POST['cpassword'], $db);
}

?>
<html>
<form action="" method="POST" id=form_inscription>
    <div><label for="login">Login actuel</label> <input type="text" name="login" placeholder=<?php echo $_SESSION['login'] ?> size="20" id="login"></div>
    <div><label for="login">Nouveau login</label> <input type="text" name="login" placeholder="Entrez votre login" size="20" id="login"></div>
    <div><label for="password">Mot de passe </label> <input type="password" name="password" placeholder="Entrez votre mot de passe" id="pass"> </div>
    <div><label for="password">Confirmez le mot de passe </label><input type="password" name="cpassword" placeholder="Entrez votre mot de passe" id="pass"></div>
    <div><input type="submit" name="submit" value="envoyer" id="submit"></div>
</form>
</html>
