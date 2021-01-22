<?php

include "../controller/db_controller/MusicDB.php";
$ajaxDB = new MusicDB();
$rows = $ajaxDB->getCds();

include "../layouts/_music_cds.php";
?>