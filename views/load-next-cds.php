<?php
include "../controller/db_controller/MusicDB.php";

$musicDB = new MusicDB();

if (isset($_POST['cds-count'])) {
    $cds = $musicDB->getCds($_POST['cds-count']);
    include "layouts/_load_next_cds.php";
}

?>