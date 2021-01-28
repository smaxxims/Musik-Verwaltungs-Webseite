<?php
include "../../utils/Util.php";
session_start();
$util = new Util();
if (isset($_SESSION['user']) && $util->valStr($_SESSION['user']) == 'admin') :

    if (isset($_POST["title"]) && isset($_POST["id"])) {

        $filename = '../../public/audio/'.$util->valStr($_POST["id"])."/".$util->valStr($_POST["title"]);
        if (file_exists($filename)) {
            unlink($filename);
            echo "<div class='alert alert-success' role='alert'>Gelöscht: $filename</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Löschen fehlgeschlagen: $filename</div>";
        }
    }
endif;

?>