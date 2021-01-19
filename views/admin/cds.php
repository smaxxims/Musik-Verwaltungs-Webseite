<?php
include "../../layouts/admin/_admin_header.html";
include "../../db/AjaxDB.php";
include "../../models/Title.php";


if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') :
    header("Location: ../home.php");

elseif (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') :

    $ajaxDB = new AjaxDB();
    $rows = $ajaxDB->getCDs();

    $titelOfCd = new Title();

    include "../../layouts/admin/_cds.php";
endif;

include "../../layouts/admin/_admin_footer.html";
?>