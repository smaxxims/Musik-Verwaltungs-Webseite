<?php

class Cd
{
    private $interpret;
    private $genre;
    private $year;
    private $image;
    private $desc;

    public function __construct($interpret = "", $genre = "", $year = 0, $image = "", $desc = "")
    {
        $this->interpret = $interpret;
        $this->genre = $genre;
        $this->year = $year;
        $this->image = $image;
        $this->desc = $desc;
    }

    public function uploadImage($imageTmpName, $image) {
        if (!empty($image)) {
            $pathToSave = "../../public/images/" . $image;
            if (move_uploaded_file($imageTmpName, $pathToSave)) {
            } else {
                echo "Upload fehlgeschlagen.";
            }
        } else {
            return $image = "noimage.jpg";
        }
    }
    
    public function getDesc(){
        return $this->desc;
    }

    public function getInterpret(){
        return $this->interpret;
    }

    public function getGenre(){
        return $this->genre;
    }

    public function getYear(){
        return $this->year;
    }

    public function getImage(){
        return $this->image;
    }


}

?>