<?php

use PHPUnit\Framework\TestCase;

include "Tests.php";
include "../models/Cd.php";

class Test extends TestCase
{
    function testAddition()
    {
        $test = new Tests();
        $result = $test->summe(3, 2);
        $this->assertEquals(5, $result);
    }

    function testDirExist()
    {

        $result = "../public/";
        $this->assertDirectoryExists($result);
        echo "complete: testDirExist";
    }

    function testIsDir()
    {
        $test = new Tests();
        $result = $test->isDirFun("../public");
        $this->assertTrue($result);
        echo "complete: testIsDirFun:  $result";
    }

    function testNoImage()
    {
        $cd = new Cd();
        $result = $cd->uploadImage("someName", "");
        $this->assertEquals("noimage.jpg", $result);
        echo "complete: testNoImage: $result";
    }
}