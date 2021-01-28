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
    } else {
        $cd = new Cd($util->valStr($_POST["interpret"]), $util->valStr($_POST["genre"]), $util->valStr($_POST["year"]), $util->valStr($_FILES["image"]["name"]), $util->valStr($_POST["desc"]));
        $cd->uploadImage($util->valStr(($_FILES['image']['tmp_name'])), $cd->getImage());

        $ajaxDB = new MusicDB();
        $ajaxDB->saveCdinDB($cd->getInterpret(), $cd->getGenre(), $cd->getYear(), $cd->getImage(), $cd->getDesc());

        echo "<div class='alert alert-success' role='alert'>CD gespeichert.</div>";
    }

} else {
    echo "Sie sind nicht als Admin eingeloggt!";
}


