<?php
session_start();
include "../../models/Cd.php";
include "../../controller/db_controller/MusicDB.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}

// cd data
if (isset($_POST["interpret"]) && isset($_POST["desc"]) && isset($_POST["id"]) && isset($_POST["genre"]) && isset($_POST["year"]) ) {

    $cd = new Cd($_POST["interpret"], $_POST["genre"], $_POST["year"], "", $_POST["desc"]);
    $ajaxDB = new MusicDB();
    $ajaxDB->updateCD($_POST["id"], $cd->getInterpret(), $cd->getGenre(), $cd->getYear(), $cd->getDesc());


}

?>