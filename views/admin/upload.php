<?php
session_start();
include "../../models/Cd.php";
include "../../controller/db_controller/MusicDB.php";
include "../../utils/Util.php";

$util = new Util();

if (!isset($_SESSION['user']) || $util->valStr($_SESSION['user']) !== 'admin') {
    header("Location: ../home.php");
}

if (isset($_FILES['image']['name']) && isset($_POST["id"])) {

    if ($util->valStr($_FILES["image"]["type"]) == "image/jpeg" ||
    $util->valStr($_FILES["image"]["type"]) == "image/png") {

    $cd = new Cd("test","test",0, $_FILES['image']['name'] , 0);
    $cd->uploadImage($_FILES['image']['tmp_name'], $cd->getImage());
    $ajaxDb = new MusicDB();
    $ajaxDb->updateImage($_POST["id"], $_FILES['image']['name']);

    } else {
        echo "<div class='alert alert-danger' role='alert'>" . $util->valStr($_FILES["image"]["name"]) . " ist eine ungültige Datei</div>";
    }

}

?>