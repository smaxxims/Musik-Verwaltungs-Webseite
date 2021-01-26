<?php
session_start();
include "../../controller/db_controller/MusicDB.php";
include "../../models/Cd.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}

$db = new MusicDB();
$row = $db->getUserByUsername(htmlspecialchars(stripslashes(trim($_SESSION["user"]))));

if (password_verify($row["code"], htmlspecialchars($_SESSION['code']))) {


if (!is_numeric(htmlspecialchars($_POST["year"]))) {
    echo "<div class='alert alert-danger' role='alert'>Bitte eine Nummer für das Jahr eintragen.</div>";
} else if (!isset($_FILES["image"]["name"])) {
    echo "<div class='alert alert-danger' role='alert'>Bitte ein Cover auswählen.</div>";
} else if (!htmlspecialchars($_POST["interpret"]) || !htmlspecialchars($_POST["genre"]) || !htmlspecialchars($_POST["year"]) || !htmlspecialchars($_POST["desc"])) {
    echo "<div class='alert alert-danger' role='alert'>Bitte alle Felder ausfüllen.</div>";
} else {
    $cd = new Cd($_POST["interpret"], $_POST["genre"], $_POST["year"], $_FILES["image"]["name"], $_POST["desc"]);
    $cd->uploadImage(htmlspecialchars($_FILES['image']['tmp_name']), $cd->getImage());

    $ajaxDB = new MusicDB();
    $ajaxDB->saveCdinDB($cd->getInterpret(), $cd->getGenre(), $cd->getYear(), $cd->getImage(), $cd->getDesc());

    echo "<div class='alert alert-success' role='alert'>CD gespeichert.</div>";
}

} else {
    echo "Sie sind nicht als Admin eingeloggt!";
}


