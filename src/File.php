<?php namespace PWC\Util;

class File {
    public static function recursive_read($src, $callable = null)
    {
        $dir = opendir($src);

        while(($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    self::recursive_read($src . '/'. $file, $callable);
                } else {
                    if (!is_null($callable)) {
                        $callable($src . '/' . $file);
                    }
                }
            }
        }

        closedir($dir);
    }
}
