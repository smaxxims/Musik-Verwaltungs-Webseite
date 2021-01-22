<?php
include "../../layouts/admin/_admin_header.html";
include "../../db/AjaxDB.php";
include "../../models/Title.php";


if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}

    $db = new AjaxDB();
    $row = $db->getUserByUsername(htmlspecialchars(stripslashes(trim($_SESSION["user"]))));

    if (password_verify( $row["code"], $_SESSION['code'])) {

        $ajaxDB = new AjaxDB();
        $rows = $ajaxDB->getCDs();

        $titelOfCd = new Title();
        include "../../layouts/admin/_cds.php";
        include "../../layouts/admin/_admin_footer.html";
    } else {
        echo "Sie sind nicht als Admin eingeloggt!";
    }

?>