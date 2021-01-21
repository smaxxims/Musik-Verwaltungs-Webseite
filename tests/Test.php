<?php

use PHPUnit\Framework\TestCase;

include "Tests.php";
include "../models/Cd.php";

class Test extends TestCase
{

    function testIsCount()
    {
        $test = new Tests();
        $result = $test->makeRandomNumsInStringOfNum(7);
        $this->assertGreaterThanOrEqual(strlen($result), 7);
        echo "complete: testIsCount";
    }
    function testIsString()
    {
        $test = new Tests();
        $result = $test->makeRandomNumsInStringOfNum(5);
        $this->assertIsString($result);
        echo "complete: testIsString";
    }
    function testIsArray()
    {
        $test = new Tests();
        $result = $test->makeRandomNumsInStringOfNum(5);
        $this->assertIsArray($result);
        echo "complete: testIsArray";
    }
    function testIsRandom()
    {
        $test = new Tests();
        $result = $test->makeRandomNumsInStringOfNum(5);
        $this->assertEquals($result, 5);
        echo "complete: testIsRandom";
    }
    function testIsInt()
    {
        $test = new Tests();
        $result = $test->makeRandomNumsInStringOfNum(5);
        $this->assertIsInt($result);
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