<?php
include "../controller/db_controller/MusicDB.php";
include "../models/User.php";
include "../utils/Util.php";

session_start();
session_unset();
if (isset($_POST['username']) && isset($_POST['password'])) :

    $util = new Util();
    $user = new User($util->valStr($_POST["username"]), $util->valStr($_POST["password"]));
    $ajaxDB = new MusicDB();

    if (empty($user->getUsername()) || empty($user->getPassword())) :
        echo "<div class='alert alert-danger' role='alert'>Bitte alle Felder ausfüllen.</div>";
    elseif ("") :
    else :
        $row = $ajaxDB->getUserByUsername($user->getUsername());

        if (!$row) :
            echo "<div class='alert alert-danger' role='alert'>Benutzername existiert nicht.</div>";
        else :
            if (password_verify($user->getPassword(), $row["password"])) :
                echo "<div class='alert alert-success' role='alert'>Eingeloggt! Sie werden in Kürze zum Adminbereich weitergeleitet.</div>";
                session_regenerate_id();
                $_SESSION['user'] = $user->getUsername();

                $secCode = $util->makeRandomNumsInStringOfNum(7);
                $ajaxDB->saveCodeForLoginUser($secCode, $user->getUsername());
                $hashedCode = password_hash($secCode, PASSWORD_DEFAULT);
                $_SESSION['code'] = $hashedCode;

            else :
                echo "<div class='alert alert-danger' role='alert'>Ungültiges Passwort.</div>";
            endif;
        endif;
    endif;

else :
    include "layouts/_login.html";
endif;
?>
