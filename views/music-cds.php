<?php
include "../controller/user/ControllerUser.php";
include "../utils/Util.php";

$util = new Util();

if (!isset($_POST["cd-search-field"])) {

    $userController1 = new ControllerUser();
    $cds = $userController1->showFirstCDs();
    include "layouts/_music_cds.php";
} else {
    $userController2 = new ControllerUser();
    $cds = $userController2->showSearchedCD($util->valStr($_POST["cd-search-field"]));
    $userController2->searchCD($util->valStr($_POST["cd-search-field"]), $cds);
}

?>

