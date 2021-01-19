<?php 
session_start();

if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') :

    if (isset($_POST["title"]) && isset($_POST["id"])) {

        $filename = '../../public/audio/'.$_POST["id"]."/".$_POST["title"];
        if (file_exists($filename)) {
            unlink($filename);
            echo "<div class='alert alert-success' role='alert'>Gelöscht: $filename</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Löschen fehlgeschlagen: $filename</div>";
        }
    }
endif;

?>