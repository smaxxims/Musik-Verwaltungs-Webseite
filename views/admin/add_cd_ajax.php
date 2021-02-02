<?php
session_start();
include "../../controller/db_controller/MusicDB.php";
include "../../models/Cd.php";
include "../../utils/Util.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}
$util = new Util();
$db = new MusicDB();
$row = $db->getUserByUsername($util->valStr($_SESSION["user"]));

if (password_verify($row["code"], $util->valStr($_SESSION['code']))) {

    if (!is_numeric($util->valStr($_POST["year"]))) {
        echo "<div class='alert alert-danger' role='alert'>Bitte eine Nummer für das Jahr eintragen.</div>";

    } else if (!isset($_FILES["image"]["name"])) {
        echo "<div class='alert alert-danger' role='alert'>Bitte ein Cover auswählen.</div>";

    } else if (!$util->valStr($_POST["interpret"]) || !$util->valStr($_POST["genre"]) || !$util->valStr($_POST["year"]) || !$util->valStr($_POST["desc"])) {
        echo "<div class='alert alert-danger' role='alert'>Bitte alle Felder ausfüllen.</div>";

    } else if ($util->valStr($_FILES["image"]["type"]) == "image/jpeg" ||
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

                    $cd = new Cd($util->valStr($_POST["interpret"]), $util->valStr($_POST["genre"]), $util->valStr($_POST["year"]), $util->valStr($_FILES["image"]["name"]), $util->valStr($_POST["desc"]));
                    $cd->uploadImage($util->valStr(($_FILES['image']['tmp_name'])), $cd->getImage());

                    $ajaxDB = new MusicDB();
                    $ajaxDB->saveCdinDB($cd->getInterpret(), $cd->getGenre(), $cd->getYear(), $cd->getImage(), $cd->getDesc());
                }
            }
        }
        echo "<div class='alert alert-success' role='alert'>CD gespeichert.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>" . $util->valStr($_FILES["image"]["name"]) . " ist eine ungültige Datei</div>";
    }

} else {
    echo "Sie sind nicht als Admin eingeloggt!";
}


