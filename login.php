<?php
    if (isset($_POST['cancel'])) {
        header("Location: index.php");
        return;
    }

    $password = 'php123';
    $salt = 'XyZzy12*_';
    $stored_hash = hash('md5', $salt.$password);

    if (isset($_POST['who']) == false) {
    } elseif (isset($_POST['pass']) == false) {
    } elseif (($_POST['who']) == null) {
        echo "Username and password are required";
    } elseif (($_POST['pass']) == null) {
        echo "Username and password are required";
    } elseif ((hash('md5', $salt.$_POST['pass']) != $stored_hash)) {
        echo "Wrong password!";
    } else {
        header("Location: game.php?who=".urlencode($_POST['who']));
        return;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Millie Schmidt Login</title>
        <link rel="stylesheet" href="./css/login.css">
    </head>
    <body>
        <div id="content">
            <h1>Log In to Play</h1>
            <form method="post">
                <label for="who">Username: </label>
                <input type="text" name="who" /><br />
                <label for="pass">Password:&nbsp; </label>
                <input type="password" name="pass" /><br />
                <input type="submit" value="Log In" />
                <input type="submit" name="cancel" value="Cancel" />
            </form>
        </div>
    </body>
</html>