<?php
include "../controller/user/ControllerUser.php";


if (!isset($_POST["cd-search-field"])) {
    $userController1 = new ControllerUser();
    $cds = $userController1->showFirstCDs();
    include "layouts/_music_cds.php";
} else {
    $userController2 = new ControllerUser();
    $cds = $userController2->showSearchedCD(htmlspecialchars(stripslashes(trim($_POST["cd-search-field"]))));
    $userController2->searchCD(htmlspecialchars(stripslashes(trim($_POST["cd-search-field"]))), $cds);
}

?>

