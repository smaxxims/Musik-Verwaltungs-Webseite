<?php
include "../controller/user/ControllerUser.php";

if (isset($_GET['id'])) :

    include "../utils/Util.php";

    $util = new Util();
    $cdData = new ControllerUser();
    $cdData->setCdId(($util->valStr($_GET['id'])));

    $row = $cdData->getCdData($cdData->getCdId());
    $music = $cdData->getFilesInDir("../public/audio/".$cdData->getCdId());

    if ($cdData->checkIdSame($util->valStr($row["id"]), $cdData->getCdId())) :
        include "layouts/_cd.php";
    else :
        echo "Keine Informationen zu dieser CD.";
    endif;

endif;
?>