<?php

use PHPUnit\Framework\TestCase;

include "../controller/db_controller/MusicDB.php";
include "../controller/user/ControllerUser.php";

class TestSearchCds extends TestCase
{
    function testSearchCdIsString()
    {
        $controllerUser = new ControllerUser();
        $result = $controllerUser->searchCD("");
        $this->assertIsString($result);
        echo "complete: testIsString";
    }
}