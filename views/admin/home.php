<?php
include "../../layouts/admin/_admin_header.html";

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') :
    header("Location: ../home.php");
endif;

include "../../layouts/admin/_home.php";

include "../../layouts/admin/_admin_footer.html";
?>