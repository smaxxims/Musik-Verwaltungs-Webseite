<?php
include "../../db/AjaxDB.php";
include "../../controller/Controller.php";

session_start();

if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') :

    $id = $_GET['id'];
    $image = $_GET['image'];

    $ajaxDB = new AjaxDB();
    $ajaxDB->deleteCD($id);

    $ajaxDB = new AjaxDB();
    $row = $ajaxDB->getCdbyID($id);

    // delete image
    if ($image !== "noimage.jpg") :

        if (unlink("../../public/images/" . $image)) :
            echo "Bild gelöscht.\n";
        else :
            echo "Bild löschen fehlgeschlagen.";
        endif;
    endif;

    // delete audio
    $delTitle = new Controller();
    $delTitle->deleteAudioDirAndFilesIn("../../public/audio/".$id);

endif;

header("location: cds");
