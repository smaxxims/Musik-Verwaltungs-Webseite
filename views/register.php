<?php
include "../controller/db_controller/MusicDB.php";
include "../models/User.php";
include "../utils/Util.php";

session_start();
session_unset();
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) :

    $util = new Util();
    $user = new User($util->valStr($_POST["username"]), $util->valStr($_POST["password"]), $util->valStr($_POST["email"]));
    $ajaxDB = new MusicDB();

    if (empty($user->getUsername()) || empty($user->getPassword()) || empty($user->getEmail())) :
        echo "<div class='alert alert-danger' role='alert'>Bitte alle Felder ausfüllen.</div>";
    elseif (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) :
        echo "<div class='alert alert-danger' role='alert'>Email ist ungültig.</div>";
    else :
        $row = $ajaxDB->getUserByUsername($user->getUsername());
        if ($row) :
            echo "<div class='alert alert-danger' role='alert'>Benutzername existiert bereits.</div>";
        else :
            if (strlen($user->getPassword()) < 7) :
                echo "<div class='alert alert-danger' role='alert'>Passwort hat weniger als 8 Zeichen.</div>";
            else :
                $secCode = $util->makeRandomNumsInStringOfNum(7);
                $hashedPass = password_hash($user->getPassword(), PASSWORD_DEFAULT);
                $ajaxDB->saveNewUser($user->getUsername(), $user->getEmail(), $hashedPass);
                $ajaxDB->saveCodeForLoginUser($secCode, $user->getUsername());

                // email
                /*$empfaenger = "$user->getEmail()";
                $betreff = "Bestätigungs-Code";
                $from = "From: smaxxims <smaxxims@gmail.com>\r\n";
                $from .= "Content-Type: text/html\r\n";
                $text = "<b>Code: </b> $secCode";

                mail($empfaenger, $betreff, $text, $from);*/

                echo "<div class='alert alert-success' role='alert'>Angemeldet, jetzt können sie sich einloggen.</div>";

                $ajaxDB->createNewTableCds($user->getUsername());

            endif;
        endif;
    endif;

else :
    include "layouts/_register.html";
endif;
?>
