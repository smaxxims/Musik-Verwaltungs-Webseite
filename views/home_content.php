<?php
include "../db/AjaxDB.php";
$ajaxDB = new AjaxDB();
$rows = $ajaxDB->getCds();
include "../layouts/_music_cds.php";

?>

