<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>register</title>
</head>
<body>
<?php

if(isset($erreur)){
    var_dump($erreur);
}

?>
<form action="../Controller/Router.php?route=register" method="post">

    <label for="name">nom</label>
    <input type="text" id="name" name="name" placeholder="entrez votre nom" require>

    <label for="mail">mail</label>
    <input type="email" name="mail" id="mail" placeholder="entrez votre email" require>

    <label for="password">mots de passe</label>
    <input type="password" name="password" id="password" placeholder="entrez votre mots de passe" require>

    <select name="exp" id="exp">
        <option disabled >choisissez</option>
        <option value="debutant">débutant</option>
        <option value="amateur">amateur</option>
        <option value="expert">expert</option>
        <option value="pro">professionnel</option>
    </select>

    <label for="description">parlez nous de vous</label>
    <textarea name="description" id="description" cols="50" rows="25"></textarea>

    <input type="submit" name="submit" value="register">

</form>

</body>

</html>