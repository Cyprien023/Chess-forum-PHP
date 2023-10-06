<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Time !</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<header>

    <body>
        <a href="./create-account.php">
            <button class="btn-sign-up">sign up</button>
        </a>
        <a href="./log-in.php">
            <button class="btn-log-in">log in</button>
        </a>
        <a href="./account.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="account-logo" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
        </a>
        <a href="./index.php">
            <h1 id="title">Chess Time !</h1>
        </a>
        <hr>



        <img class="background" src="./images/chess-background.png" alt="chess board">

</header>

<?php
function loadClass($class)
{
    if (strpos($class, "Manager")) {
        require "../Manager/$class.php";
    } else {
        require "../Entity/$class.php";
    }
}
spl_autoload_register("loadClass");

// Créé une instance de la classe 
$subjectManager = new SubjectManager();
$userManager = new UserManager();
$postManager = new PostManager();

?>