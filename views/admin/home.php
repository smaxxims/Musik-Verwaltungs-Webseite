<?php
include "../../layouts/admin/_admin_header.html";
include "../../db/AjaxDB.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') :
    header("Location: ../home.php");
endif;

$db = new AjaxDB();
$row = $db->getUserByUsername(htmlspecialchars(stripslashes(trim($_SESSION["user"]))));

if (password_verify( $row["code"], $_SESSION['code'])) {
    include "../../layouts/admin/_home.php";
    include "../../layouts/admin/_admin_footer.html";
} else {
    echo "Sie sind nicht als Admin eingeloggt!";
}


?>