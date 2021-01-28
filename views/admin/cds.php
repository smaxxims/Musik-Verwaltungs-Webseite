<?php
include "../layouts/admin/_admin_header.html";
include "../../controller/db_controller/MusicDB.php";
include "../../controller/admin/ControllerAdmin.php";
include "../../utils/Util.php";


if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}

$util = new Util();
$db = new MusicDB();
$row = $db->getUserByUsername($util->valStr($_SESSION["user"]));

if (password_verify($row["code"], $util->valStr($_SESSION['code']))) {

    $ajaxDB = new MusicDB();
    $rows = $ajaxDB->getCDs(0, 20);

    $titelOfCd = new ControllerAdmin();
    include "../layouts/admin/_cds.php";
    include "../layouts/admin/_admin_footer.html";
} else {
    echo "Sie sind nicht als Admin eingeloggt!";
}

?>