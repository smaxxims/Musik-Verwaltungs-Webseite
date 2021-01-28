<?php
include "ConnectMySQL.php";

class MusicDB extends ConnectMySQL {

    private $id;
    private $TABLE_CDS = 'cds';
    private $TABLE_USER = 'user';

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = htmlspecialchars(stripslashes(trim($id)));
    }

    // table user
    public function getUserByUsername($username)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `$this->DB_DATABASE`.`$this->TABLE_USER` WHERE `name`='$username' LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function saveCodeForLoginUser(string $code, string $username)
    {
        $conn = $this->connectToDB();

        $sql = $conn->prepare("UPDATE `$this->DB_DATABASE`.`$this->TABLE_USER` SET `code`='$code' WHERE `name`='$username' LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
    }

    // table cds
    public function saveCdinDB($interpret, $genre, $year, $image, $desc)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("INSERT INTO `$this->DB_DATABASE`.`$this->TABLE_CDS` (`interpret`, `genre`, `year`, `image`, `desc`) VALUES ('$interpret', '$genre', '$year', '$image', '$desc')");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
    }

    public function getCDs($startCd = 0, $endCd = 3)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `$this->DB_DATABASE`.`$this->TABLE_CDS` LIMIT $startCd,$endCd");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
        $rows = $result->fetchAll();
        return $rows;
    }

    public function updateImage($id, $image)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("UPDATE `$this->DB_DATABASE`.`$this->TABLE_CDS` SET `image`='$image' WHERE  `id`=$id");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        } else {
            echo "<div class='alert alert-success' role='alert'>Cover wurde aktuallisiert..</div>";
        }
    }

    public function getCdbyID($id)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `$this->DB_DATABASE`.`$this->TABLE_CDS` WHERE `id`=$id LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateCD($id, $interpret, $genre, $year, $desc)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("UPDATE `$this->DB_DATABASE`.`$this->TABLE_CDS` SET `interpret`='$interpret', `genre`='$genre', `year`=$year, `desc`='$desc' WHERE  `id`=$id");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        } else {
            echo "<div class='alert alert-success' role='alert'>CD Daten aktualliesiert.</div>";
        }
    }

    public function deleteCD($id)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("DELETE FROM `$this->DB_DATABASE`.`$this->TABLE_CDS` WHERE `id`=$id");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        } else {
            echo "<div class='alert alert-success' role='alert'>CD gelöscht.</div>";
        }
    }

}



?>