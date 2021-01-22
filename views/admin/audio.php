<?php
include "../../models/Title.php";

$i = 0;
function uploadAudio($i) {
    if (isset($_FILES['audio'.$i]['name']) && isset($_POST["id"])) {

        $titleUpload = new Title($_FILES["audio" . $i]["name"], $_FILES["audio" . $i]["type"], $_FILES["audio" . $i]["size"], $_FILES["audio" . $i]["error"], $_FILES["audio" . $i]['tmp_name']);
        $titleUpload->uploadTitle($_POST['id']);

        if (isset($_FILES['audio'.($i + 1)]['name'])) {
        uploadAudio($i + 1);
        }
    }
}
uploadAudio($i);

?>
