
Si rien dans login et password => Merci de remplir les champs

Si champs login et password remplit
    vérifie pas vide (trim) => Merci de remmplir les champs
        vérifie que login et mot de passe n'existe pas dans bdd => le login et le mot de passe existe déjà
            Crypte le mot de passe et on protége injection sql
                Insertion dans la base de données

                Création d'une variable de session login et id
                Redirection vers accueil