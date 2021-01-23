<?php
use PHPUnit\Framework\TestCase;

class TestCds extends TestCase
{
    function testIsArray()
    {
        include "../controller/db_controller/MusicDB.php";
        $musiDb = new MusicDB();
        $result = $musiDb->getCds();
        $this->assertIsArray($result);
        echo "complete: testIsArrayof";
    }
}