<?php
spl_autoload_register(function ($classname) {
    $filename = "../controller/db_controller/". $classname .".php";
    include_once($filename);
});


class ControllerUser
{
    private $cdId;

    public function getCdId()
    {
        return $this->cdId;
    }

    public function setCdId($cdId): void
    {
        $this->cdId = htmlspecialchars(stripslashes(trim($cdId)));
    }

    public function getFilesInDir($directory)
    {
        if (is_dir($directory)) {
            $folder = opendir($directory);
            $file_array = [];

            while ($file = readdir($folder)) {
                if ($file !== '.' && $file !== '..') {
                    $file_array[] = array("filename" => $file);
                }
            }
            return $file_array;
        } else {
            return [];
        }
    }

    public function showFirstCDs() : array
    {
        $musicDB = new MusicDB();
        $cds = $musicDB->getCds();
        return $cds;
    }

    public function showSearchedCD($inputSearchCD) : array {
        $musicDB = new MusicDB();

        if ($inputSearchCD == "") {
            $cds = $musicDB->getCds();
        } else {
            $cds = $musicDB->getCds(0, 20);
        }
        return $cds;
    }

    public function searchCD($inputSearchCD, $cds)
    {
        $notFind = 0;
        $find = 0;
        foreach ($cds as $cd) {
            if (str_contains(strtolower($cd["interpret"]), strtolower($inputSearchCD)) && $inputSearchCD != "") {
                $find = 1;
                include "layouts/_searched_cds.php";
            } else if ($inputSearchCD == "") {
                include "layouts/_searched_cds.php";
            } else if (!str_contains(strtolower($cd["interpret"]), strtolower($inputSearchCD))) {
                $notFind = 1;
            }
        }

        if ($notFind == 1 && $find == 0) {
            echo "Keine Cds unter folgendem Namen gefunden: \"" . $inputSearchCD . "\"";
        }
    }

    public function getCdData($cdId)
    {
        $musicDB = new MusicDB();
        return $row = $musicDB->getCdbyID($cdId);

    }

    public function checkIdSame($rowId, $cdId) : bool
    {
        return $rowId === $cdId;
    }
}











