<?php
include "../layouts/admin/_admin_header.html";
include "../../controller/db_controller/MusicDB.php";

if (!isset($_SESSION['user'])) :
    header("Location: ../home");
endif;

$db = new MusicDB();
$row = $db->getUserByUsername(htmlspecialchars(stripslashes(trim($_SESSION["user"]))));

if (password_verify( $row["code"], $_SESSION['code'])) {
    include "../layouts/admin/_home.php";
    include "../layouts/admin/_admin_footer.html";
} else {
    echo "Sie sind nicht als Admin eingeloggt!";
}


?>