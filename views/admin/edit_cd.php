<?php
include "../layouts/admin/_admin_header.html";
include "../../controller/db_controller/MusicDB.php";
include "../../models/Cd.php";
include "../../controller/admin/ControllerAdmin.php";
include "../../utils/Util.php";


if (!isset($_SESSION['user'])) {
    header("Location: ../home");
}
$util = new Util();

if (isset($_GET['id'])) :
    $id = $util->valStr($_GET['id']);

// get cd data and image by id from db
    $ajaxDB = new MusicDB();
    $rowCD = $ajaxDB->getCdbyID($util->valStr($_SESSION["user"]), $id);

// get audio from dir
    $getTitles = new ControllerAdmin();
    $music = $getTitles->getFilesInDir("../../public/audio/".$id);

    if ($rowCD["id"] == $id) :
        include "../layouts/admin/_edit_cd.php";
    endif;
endif;
include "../layouts/admin/_admin_footer.html";
?>

<script>
    // preview image
    function readUrl(input) {

        if (input.files && input.files[0]) {
            const reader = new FileReader()

            reader.onload = function (e) {
                $("#imgPreview").attr('src', e.target.result).width(300)
            }
            reader.readAsDataURL(input.files[0])
        }
    }

    $("#img").change(function () {
        readUrl(this)
    })


</script>

