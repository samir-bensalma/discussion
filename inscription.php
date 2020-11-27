
<?php

session_start();
require_once('config.php');
require_once('function.php');
?>


<html>
<form action="" method="POST" id=form_inscription>
    <div><label for="login">Login</label> <input type="text" name="login" placeholder="Entrez votre login" size="20" id="login"></div>
    <div><label for="password">Mot de passe </label> <input type="password" name="password" placeholder="Entrez votre mot de passe" id="pass"> </div>
    <div><label for="password">Confirmez le mot de passe </label><input type="password" name="cpassword" placeholder="Entrez votre mot de passe" id="pass"></div>
    <div><input type="submit" name="submit" value="envoyer" id="submit"></div>
</form>

<?php
if (isset($_POST['submit'])) {
register($_POST['login'], $_POST['password'], $_POST['cpassword']);
}
?>
</html>
