<?php
include "../../layouts/admin/_admin_header.html";
include "../../db/AjaxDB.php";
include "../../models/Cd.php";
include "../../controller/Controller.php";


if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}

if (isset($_GET['id'])) :
    $id = $_GET['id'];

// get cd data and image by id from db
    $ajaxDB = new AjaxDB();
    $rowCD = $ajaxDB->getCdbyID($id);

// get audio from dir
    $getTitles = new Controller();
    $music = $getTitles->getFilesInDir("../../public/audio/".$id);

    if ($rowCD["id"] == $id) :
        include "../../layouts/admin/_edit_cd.php";
    endif;
endif;
include "../../layouts/admin/_admin_footer.html";
?>

<script>
    // preview image
    function readUrl(input) {

        if (input.files && input.files[0]) {
            const reader = new FileReader()

            reader.onload = function (e) {
                $("#imgPreview").attr('src', e.target.result).width(400)
            }
            reader.readAsDataURL(input.files[0])
        }
    }

    $("#img").change(function () {
        readUrl(this)
    })


</script>

