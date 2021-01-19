<?php
include "ConnectMySQL.php";

class AjaxDB extends ConnectMySQL {

    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    /*if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        $stmt->close();
    }*/

    public function getUserPasswordByUsername($username)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `music`.`user` WHERE `name`='$username' LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function saveCdinDB($interpret, $genre, $year, $image, $desc)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("INSERT INTO `music`.`cds` (`interpret`, `genre`, `year`, `image`, `desc`) VALUES ('$interpret', '$genre', $year, '$image', '$desc') LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
    }

    public function getCDs() 
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `music`.`cds` LIMIT 1000");
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
        $sql = $conn->prepare("UPDATE `music`.`cds` SET `image`='$image' WHERE  `id`=$id LIMIT 1000");
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
        $sql = $conn->prepare("SELECT * FROM `music`.`cds` WHERE `id`=$id LIMIT 1000");
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
        $sql = $conn->prepare("UPDATE `music`.`cds` SET `interpret`='$interpret', `genre`='$genre', `year`=$year, `desc`='$desc' WHERE  `id`=$id LIMIT 1000");
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
        $sql = $conn->prepare("DELETE FROM `music`.`cds` WHERE `id`=$id LIMIT 1000");
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