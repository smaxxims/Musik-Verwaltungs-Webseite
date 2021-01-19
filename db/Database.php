<?php
include "ConnectMySQL.php";

class Database extends ConnectMySQL
{
    public function getAllCds()
    {
        $conn = $this->connectToDB();
        $sql = "SELECT * FROM `music`.`cds` LIMIT 1000";
        $result = $conn->query($sql);
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
        return $result;
    }

    public function getCdbyID($id)
    {
        $conn = $this->connectToDB();
        $sql = "SELECT * FROM `music`.`cds` WHERE `id`=$id LIMIT 1000";
        $result = $conn->query($sql);
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
        return $result;
    }


    public function getIdByInterpret($interpret)
    {
        $conn = $this->connectToDB();
        $sql = "SELECT `id` FROM `music`.`cds` WHERE `interpret`='$interpret 'LIMIT 1000";
        $result = $conn->query($sql);
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
        return $result;
    }

    public function getTitlesCountByInterpret($interpret)
    {
        $conn = $this->connectToDB();
        $sql = "SELECT `title` FROM `music`.`cds` WHERE `interpret`='$interpret' LIMIT 1000";
        $result = $conn->query($sql);
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
        return $result;
    }

    public function saveCdinDB($interpret, $genre, $year, $image, $title)
    {
        $conn = $this->connectToDB();
        $sql = "INSERT INTO `music`.`cds` (`interpret`, `genre`, `year`, `image`, `title`) VALUES ('$interpret', '$genre', $year, '$image', $title) LIMIT 1000";
        if (mysqli_query($conn, $sql)) {
            echo "Neue CD wurde gespeichert.<br>";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
    }

    public function saveTitle($id, $name, $length)
    {
        echo "test";
        $conn = $this->connectToDB();
        $sql = "INSERT INTO `music`.`title` (`id_cd`, `name`, `length`) VALUES ($id, '$name', $length) LIMIT 1000";
        if (mysqli_query($conn, $sql)) {
            echo "Title wurden angelegt.<br>";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
    }

    public function getUserPasswordByUsername($username)
    {
        $conn = $this->connectToDB();
        $sql = "SELECT * FROM `music`.`user` WHERE `name`='$username' LIMIT 1000";
        $result = $conn->query($sql);
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
        return $result;
    }

    public function deleteCD($id)
    {
        $conn = $this->connectToDB();
        $sql = "DELETE FROM `music`.`cds` WHERE `id`=$id LIMIT 1000";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
    }

    public function deleteTitles($id)
    {
        $conn = $this->connectToDB();
        $sql = "DELETE FROM `music`.`title` WHERE `id_cd`=$id LIMIT 1000";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
    }

    public function updateCD($id, $interpret, $genre, $year, $image)
    {
        $conn = $this->connectToDB();
        $sql = "UPDATE `music`.`cds` SET `interpret`='$interpret', `genre`='$genre', `year`='$year', `image`='$image' WHERE  `id`=$id LIMIT 1000";
        if (mysqli_query($conn, $sql)) {
            echo "CD wurde aktualisiert.<br>";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
    }

    public function updateTitle($id, $name, $length, $title_id)
    {

        $conn = $this->connectToDB();
        $sql = "UPDATE `music`.`title` SET `name`='$name', `length`='$length' WHERE `id_cd`=$id AND `id`=$title_id LIMIT 1000";
        if (mysqli_query($conn, $sql)) {
            echo "Titel wurden aktualisiert.<br>";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
    }

    public function getTitleAndLength($id)
    {
        $conn = $this->connectToDB();
        $sql = "SELECT * FROM `music`.`title` WHERE `id_cd`=$id LIMIT 1000";
        $result = $conn->query($sql);
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        $conn->close();
        return $result;
    }
}

?>
