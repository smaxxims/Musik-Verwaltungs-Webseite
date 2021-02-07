<?php
include "../../controller/db_controller/MusicDB.php";
include "../../controller/admin/ControllerAdmin.php";
include "../../utils/Util.php";

session_start();

$util = new Util();

if (isset($_SESSION['user'])) :

    $id = $util->valStr($_GET['id']);
    $image = $util->valStr($_GET['image']);

    $ajaxDB = new MusicDB();
    $ajaxDB->deleteCD($util->valStr($_SESSION['user']), $id);

    $ajaxDB = new MusicDB();
    $row = $ajaxDB->getCdbyID($util->valStr($_SESSION['user']), $id);

    // delete image
    if ($image !== "noimage.jpg") :

        if (unlink("../../public/images/" . $image)) :
            echo "Bild gelöscht.\n";
        else :
            echo "Bild löschen fehlgeschlagen.";
        endif;
    endif;

    // delete audio
    $delTitle = new ControllerAdmin();
    $delTitle->deleteAudioDirAndFilesIn("../../public/audio/".$id);

endif;

header("location: cds");
