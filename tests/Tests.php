<?php

class Tests
{

    public function isDirFun($dir)
    {
        return is_dir($dir);
    }

    public function makeRandomNumsInStringOfNum(int $num): string
    {
        $string = "";
        for ($i = 0; $i < $num; $i++) {
            $string = $string.random_int(0, 9);
        }
        return $string;
    }
}
