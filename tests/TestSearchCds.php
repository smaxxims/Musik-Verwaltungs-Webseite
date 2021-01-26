<?php

use PHPUnit\Framework\TestCase;

include "../controller/db_controller/MusicDB.php";
include "../controller/user/ControllerUser.php";

class TestSearchCds extends TestCase
{
    function testShowSearchedCdIsArray()
    {
        $controllerUser = new ControllerUser();
        $result = $controllerUser->showSearchedCD("");
        $this->assertIsArray($result);
        echo "complete: testShowSearchedCdIsArray";
    }
    function testShowSearchedCdCountIfInputIsEmpty()
    {
        $controllerUser = new ControllerUser();
        $result = $controllerUser->showSearchedCD("");
        $expectedCount = 3;
        $this->assertCount(
            $expectedCount,
            $result, "testArray doesn't contains 3 elements"
        );
        echo "complete: testShowSearchedCdCountIfInputIsEmpty";
    }
}