<?php
include "../db/AjaxDB.php";
include "../models/User.php";

session_start();
session_unset();
if (isset($_POST['username']) && isset($_POST['password'])) :

    $user = new User($_POST["username"], $_POST["password"]);
    $ajaxDB = new AjaxDB();

    if (empty($user->getUsername()) || empty($user->getPassword())) :
        echo "<div class='alert alert-danger' role='alert'>Bitte alle Felder ausfüllen.</div>";
    else :

        $row = $ajaxDB->getUserPasswordByUsername($user->getUsername());

        if (!$row) :
            echo "<div class='alert alert-danger' role='alert'>Benutzername existiert nicht.</div>";
        else :
            if (password_verify($user->getPassword(), $row["password"])) {
                $_SESSION['user'] = 'admin';
                echo "<div class='alert alert-success' role='alert'>Eingeloggt! Sie werden in Kürze zum Adminbereich weitergeleitet.</div>";

            } else {
                echo "<div class='alert alert-danger' role='alert'>Ungültiges Passwort.</div>";
            }
        endif;
    endif;

else :
    include "../layouts/_login.html";
endif;
?>
