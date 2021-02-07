<?php
session_start();
include "../../models/Cd.php";
include "../../controller/db_controller/MusicDB.php";
include "../../utils/Util.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../home");
}

// cd data
if (isset($_POST["interpret"]) && isset($_POST["desc"]) && isset($_POST["id"]) && isset($_POST["genre"]) && isset($_POST["year"]) ) {

    $util = new Util();
    $cd = new Cd($util->valStr($_POST["interpret"]), $util->valStr($_POST["genre"]), $util->valStr($_POST["year"]), $util->valStr(""), $util->valStr($_POST["desc"]));
    $ajaxDB = new MusicDB();
    $ajaxDB->updateCD($util->valStr($_SESSION["user"]), $util->valStr($_POST["id"]), $cd->getInterpret(), $cd->getGenre(), $cd->getYear(), $cd->getDesc());

}

?>