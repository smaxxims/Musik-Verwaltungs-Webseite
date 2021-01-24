<?php
include "../controller/db_controller/MusicDB.php";

$musicDB = new MusicDB();

// post from nav
if (!isset($_POST["cd-search-field"])) {
    $cds = $musicDB->getCds();
    include "layouts/_music_cds.php";
} else {
    // post from search
    if ($_POST["cd-search-field"] == "") {
        $cds = $musicDB->getCds();
    } else {
    $cds = $musicDB->getCds(0, 20);
    }

    $i = 0;
    $j = 0;
    foreach ($cds as $cd) {
        if (str_contains(strtolower($cd["interpret"]) , strtolower($_POST["cd-search-field"])) && $_POST["cd-search-field"] != "") {
            include "layouts/_searched_cds.php";
            $j = 1;
        } else if($_POST["cd-search-field"] == "") {
            $cds = $musicDB->getCds();
            include "layouts/_searched_cds.php";
        } else if(!str_contains(strtolower($cd["interpret"]) , strtolower($_POST["cd-search-field"]))) {
            $i = 1;
        }
    }

    if ($i == 1 && $j == 0) {
        echo "Keine Cds unter diesem Namen gefunden: \"".$_POST["cd-search-field"]."\"";
    }
}

?>

