<?php
include "../controller/db_controller/MusicDB.php";
include "../utils/Util.php";



if (isset($_POST['cds-count'])) {
    $util = new Util();
    $musicDB = new MusicDB();
    $cds = $musicDB->getCds($util->valStr($_POST['cds-count']));
    include "layouts/_load_next_cds.php";
}

?>