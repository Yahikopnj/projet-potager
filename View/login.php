<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../Controller/Router.php?connexion=login" method="post">

<label for="mail">votre e-mail</label>
<input type="email" name="mail" id="mail" require placeholder="entrez votre e-mail">

<label for="password">password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Login">
    </form>
</body>
</html>