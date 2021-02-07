<?php
session_start();
include "../../models/Cd.php";
include "../../controller/db_controller/MusicDB.php";
include "../../utils/Util.php";

$util = new Util();

if (!isset($_SESSION['user'])) {
    header("Location: ../home");
}

if (isset($_FILES['image']['name']) && isset($_POST["id"])) {

    if ($util->valStr($_FILES["image"]["type"]) == "image/jpeg" ||
        $util->valStr($_FILES["image"]["type"]) == "image/png") {
        //Überprüfung der Dateigröße
        $max_size = 500 * 1024; //500 KB
        if ($_FILES['image']['size'] > $max_size) {
            echo "<div class='alert alert-danger' role='alert'>Bitte keine Dateien größer 500kb hochladen</div>";
        } else {
            //Überprüfung dass das Bild keine Fehler enthält
            if (function_exists('exif_imagetype')) { //exif_imagetype erfordert die exif-Erweiterung
                $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
                $detected_type = exif_imagetype($_FILES['image']['tmp_name']);
                if (!in_array($detected_type, $allowed_types)) {
                    echo "<div class='alert alert-danger' role='alert'>Nur der Upload von Bilddateien ist gestattet</div>";
                } else {
                    $cd = new Cd("test", "test", 0, $_FILES['image']['name'], 0);
                    $cd->uploadImage($_FILES['image']['tmp_name'], $cd->getImage());
                    $ajaxDb = new MusicDB();
                    $ajaxDb->updateImage($util->valStr($_SESSION['user']), $_POST["id"], $_FILES['image']['name']);
                }
            }
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>" . $util->valStr($_FILES["image"]["name"]) . " ist eine ungültige Datei</div>";
    }

}

?>