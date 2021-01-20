<?php

class Title
{
    private $titleName;
    private $titleType;
    private $allowType = 'audio/mpeg';
    private $titleLength;
    private $error;
    private $tmpName;

    public function __construct($titleName = "", $titleType = "", $titleLength = "", $error = 0, $tmpName = "")
    {
        $this->titleName = htmlspecialchars(stripslashes(trim($titleName)));
        $this->titleType = htmlspecialchars(stripslashes(trim($titleType)));
        $this->titleLength = htmlspecialchars(stripslashes(trim($titleLength)));
        $this->error = htmlspecialchars(stripslashes(trim($error)));
        $this->tmpName = $tmpName;
    }

    public function uploadTitle($rowCD)
    {
        /* upload Audio */
        if ($this->titleName && $this->titleType == $this->allowType) {

            if ($this->error > 0) {
                echo "Return Code: " . $this->error . "<br />";
            } else {

// Create directory if it does not exist
                if (!is_dir("../../public/audio/" . $rowCD . "/")) {
                    mkdir("../../public/audio/" . $rowCD . "/");
                }
// Move the uploaded file
                $uploadDir = "../../public/audio/" . $rowCD . "/" . basename($this->titleName);
                if (move_uploaded_file($this->tmpName, $uploadDir)) {
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Upload fehlgeschlagen</div>";
                    return;
                }
// Output location
                echo "<div class='alert alert-success' role='alert'>$this->titleName gespeichert in: $uploadDir</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Ungültige Datei</div>";
            return;
        }
    }

    public function getUploadedFiles($directory)
    {
        if (is_dir($directory)) :
            $folder = opendir($directory);
            while ($file = readdir($folder)) {

                if ($file !== '.' && $file !== '..') {
                    $filename = $directory . '/' . $file;
                    //$file_array = array($filename);
                    $file_array[] = array("filename" => $file);
                }
            }
            return $file_array; // check if empty before return
        else :
            return [];
        endif;
    }

    public function delTree($dir)
    {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }


    public function getTitleName()
    {
        return $this->titleName;
    }

    public function getTitleLength()
    {
        return $this->titleLength;
    }
}

?>