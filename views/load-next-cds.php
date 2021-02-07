<?php
include "../controller/db_controller/MusicDB.php";
include "../utils/Util.php";



if (isset($_POST['cds-count'])) {
    $util = new Util();
    $musicDB = new MusicDB();
    session_start();
    if (isset($_SESSION["user"])) {
        $userName = $util->valStr($_SESSION['user']);
    } else {
        $userName = 'admin_cds';
    }
    $cds = $musicDB->getCds($userName, $util->valStr($_POST['cds-count']));
    include "layouts/_load_next_cds.php";
}

?>