<?php

class Controller {

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

    public function deleteAudioDirAndFilesIn($dir)
    {
        if (!scandir($dir)) return;

        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
}

?>
