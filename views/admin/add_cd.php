
<?php
include "../../layouts/admin/_admin_header.html";
include "../../controller/db_controller/MusicDB.php";
include "../../models/Cd.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}


include "../../layouts/admin/_add_cd.html";
include "../../layouts/admin/_admin_footer.html";
?>

<script>
    $(document).ready(function () {

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
    });


</script>

