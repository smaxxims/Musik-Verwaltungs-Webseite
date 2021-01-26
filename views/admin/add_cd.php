<?php
include "../layouts/admin/_admin_header.html";
include "../../controller/db_controller/MusicDB.php";
include "../../models/Cd.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}

$db = new MusicDB();
$row = $db->getUserByUsername(htmlspecialchars(stripslashes(trim($_SESSION["user"]))));

if (password_verify($row["code"], $_SESSION['code'])) {
    include "../layouts/admin/_add_cd.html";
    include "../layouts/admin/_admin_footer.html";
} else {
    echo "Sie sind nicht als Admin eingeloggt!";
}

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

