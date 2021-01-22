<?php
include "../controller/db_controller/MusicDB.php";
include "../controller/user/ControllerUser.php";

if (isset($_GET['id'])) :

    $id = $_GET['id'];
    $ajaxDB = new MusicDB();
    $row = $ajaxDB->getCdbyID($id);

    //include "audio.php";
    $title = new ControllerUser();
    $music = $title->getFilesInDir("../public/audio/".$id);

    if ($row["id"] == $id) :
        include "../layouts/_cd.php";
    else :
        echo "Keine Informationen zu dieser CD.";
    endif;
endif;
?>