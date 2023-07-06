<?php

function Cons(string $message)
{
    echo '<script>';
    echo 'console.log("' . $message . '");';
    echo '</script>';
}

require "models/User.php";
require "logic/database.php";
require "logic/router.php";

if(isset($_GET["route"]))
{
    checkRoute($_GET["route"]);
}
else
{
    checkRoute("");
}


if(isset($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"], $_POST["confirmPassword"]))
{
    if($_POST["password"] === $_POST["confirmPassword"])
    {
        $newUser = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"]);
        $passHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $newUser->setPassword($passHash);
        saveUser($newUser);
    }
    else
    {
        checkRoute("creer-un-compte");
        $color = 'red';
        $text = 'Mot de passe de confirmation, différent du mot de passe.';
        echo '<span style="color: ' . $color . '; margin-left: 1rem;">' . $text . '</span>';
    }
}
else if(isset($_POST["login"], $_POST["password"]))
{
    $user = loadUser($_POST["login"]);
    $hash = $user->getPassword();
    if(password_verify($_POST['password'], $hash))
    {
        session_start();
        $_SESSION["user"] = $user;
        checkRoute("mon-compte");
    }
    else
    {
        checkRoute("connexion");
        $color = 'red';
        $badmdp = "Identifiant ou mot de passe incorrect.";
        echo '<span style="color: ' . $color . '; margin-left: 1rem;">' . $badmdp . '</span>';
    }
}
?>