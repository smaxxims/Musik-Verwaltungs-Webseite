<?php

class ControllerUser
{
    public function getFilesInDir($directory)
    {
        if (is_dir($directory)) {
            $folder = opendir($directory);
            $file_array = [];

            while ($file = readdir($folder)) {

                if ($file !== '.' && $file !== '..') {
                    $file_array[] = array("filename" => $file);
                }
            }
            return $file_array;
        } else {
            return [];
        }
    }
}