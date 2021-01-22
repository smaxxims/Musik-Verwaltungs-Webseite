<?php
include "../layouts/admin/_admin_header.html";
include "../../controller/db_controller/MusicDB.php";
include "../../controller/admin/ControllerAdmin.php";


if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}

    $db = new MusicDB();
    $row = $db->getUserByUsername(htmlspecialchars(stripslashes(trim($_SESSION["user"]))));

    if (password_verify( $row["code"], $_SESSION['code'])) {

        $ajaxDB = new MusicDB();
        $rows = $ajaxDB->getCDs();

        $titelOfCd = new ControllerAdmin();
        include "../layouts/admin/_cds.php";
        include "../layouts/admin/_admin_footer.html";
    } else {
        echo "Sie sind nicht als Admin eingeloggt!";
    }

?>