<?php
include "ConnectMySQL.php";

class MusicDB extends ConnectMySQL
{

    private $id;
    private $TABLE_CDS = 'admin_cds';
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

    public function saveNewUser($userName, $email, $pass, $admin = 0, $active = 0)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("INSERT INTO `$this->DB_DATABASE`.`$this->TABLE_USER` (`name`, `password`, `admin` ,`email`,`active`) VALUES ('$userName', '$pass', '$admin' ,'$email', '$active')");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
    }

    // create new table cds for user
    public function createNewTableCds($userName)
    {
        $tableName = $userName . '_cds';

        $conn = $this->connectToDB();
        $sql = $conn->prepare("CREATE TABLE IF NOT EXISTS `$tableName` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `interpret` varchar(255) NOT NULL,
        `genre` varchar(255) NOT NULL,
        `year` year(4) NOT NULL,
        `image` varchar(255) NOT NULL,
        `desc` varchar(10000) NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
    }

    // table cds
    public function saveCdinDB($userName, $interpret, $genre, $year, $image, $desc)
    {
        $tableName = $userName . '_cds';

        $conn = $this->connectToDB();
        $sql = $conn->prepare("INSERT INTO `$this->DB_DATABASE`.`$tableName` (`interpret`, `genre`, `year`, `image`, `desc`) VALUES ('$interpret', '$genre', '$year', '$image', '$desc')");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
    }

    public function getCDs($userName = 'admin_cds', $startCd = 0, $endCd = 3)
    {
        if ($userName == 'admin_cds') {
        $tableName = 'admin_cds';
        } else {
        $tableName = $userName . '_cds';
        }

        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `$this->DB_DATABASE`.`$tableName` LIMIT $startCd,$endCd");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
        $rows = $result->fetchAll();
        return $rows;
    }

    public function updateImage($userName, $id, $image)
    {
        $tableName = $userName . '_cds';

        $conn = $this->connectToDB();
        $sql = $conn->prepare("UPDATE `$this->DB_DATABASE`.`$tableName` SET `image`='$image' WHERE  `id`=$id");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        } else {
            echo "<div class='alert alert-success' role='alert'>Cover wurde aktuallisiert..</div>";
        }
    }

    public function getCdbyID($userName, $id)
    {
        if ($userName == 'admin_cds') {
            $tableName = 'admin_cds';
        } else {
            $tableName = $userName . '_cds';
        }

        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `$this->DB_DATABASE`.`$tableName` WHERE `id`=$id LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateCD($userName, $id, $interpret, $genre, $year, $desc)
    {
        $tableName = $userName . '_cds';

        $conn = $this->connectToDB();
        $sql = $conn->prepare("UPDATE `$this->DB_DATABASE`.`$tableName` SET `interpret`='$interpret', `genre`='$genre', `year`=$year, `desc`='$desc' WHERE  `id`=$id");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        } else {
            echo "<div class='alert alert-success' role='alert'>CD Daten aktualliesiert.</div>";
        }
    }

    public function deleteCD($userName, $id)
    {
        $tableName = $userName . '_cds';

        $conn = $this->connectToDB();
        $sql = $conn->prepare("DELETE FROM `$this->DB_DATABASE`.`$tableName` WHERE `id`=$id");
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