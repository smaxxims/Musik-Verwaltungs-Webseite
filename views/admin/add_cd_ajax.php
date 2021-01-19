<?php
session_start(); 
include "../../db/AjaxDB.php";
include "../../models/cd.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}

if ($_POST["interpret"] && $_POST["genre"] && $_POST["year"] && $_FILES["image"]["name"] && $_POST["desc"]) {


    $cd = new Cd($_POST["interpret"], $_POST["genre"], $_POST["year"], $_FILES["image"]["name"], $_POST["desc"]);
    $cd->uploadImage($_FILES['image']['tmp_name'], $cd->getImage());


    $ajaxDB = new AjaxDB();
    $ajaxDB->saveCdinDB($cd->getInterpret(), $cd->getGenre(), $cd->getYear(), $cd->getImage(), $cd->getDesc());

    echo "<div class='alert alert-success' role='alert'>CD gespeichert.</div>";

} else {
    echo "<div class='alert alert-danger' role='alert'>Bitte alle Felder ausfüllen.</div>";
}
