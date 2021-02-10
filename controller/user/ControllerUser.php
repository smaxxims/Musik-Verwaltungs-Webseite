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

    public function showFirstCDs($userName = 'admin_cds') : array
    {
        $musicDB = new MusicDB();
        $cds = $musicDB->getCds($userName);
        return $cds;
    }

    public function showSearchedCD($userName, $inputSearchCD) : array {
        $musicDB = new MusicDB();

        if ($inputSearchCD == "") {
            $cds = $musicDB->getCds($userName);
        } else {
            $cds = $musicDB->getCds($userName,0, 20);
        }
        return $cds;
    }

    public function searchCD($inputSearchCD, $cds)
    {
        include_once "../utils/Util.php";
        $util = new Util();

        $notFind = 0;
        $find = 0;
        foreach ($cds as $cd) {
            //php 8 with str_contains
            //if (str_contains(strtolower($cd["interpret"]), strtolower($inputSearchCD)) && $inputSearchCD != "") {
            if (substr_compare(strtolower($cd["interpret"]), strtolower($inputSearchCD), 0) == 0 && $inputSearchCD != "") {
                $find = 1;
                include "layouts/_searched_cds.php";
            } else if ($inputSearchCD == "") {
                include "layouts/_searched_cds.php";
            } else if (!substr_compare(strtolower($cd["interpret"]), strtolower($inputSearchCD), 0) == 0) {
                $notFind = 1;
            }
        }

        if ($notFind == 1 && $find == 0) {
            echo "Keine Cds unter folgendem Namen gefunden: \"" . $inputSearchCD . "\"";
        }
    }

    public function getCdData($userName = 'admin_cds', $cdId)
    {
        $musicDB = new MusicDB();
        return $row = $musicDB->getCdbyID($userName, $cdId);

    }

    public function checkIdSame($rowId, $cdId) : bool
    {
        return $rowId === $cdId;
    }
}











