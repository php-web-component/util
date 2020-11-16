<?php namespace PWC\Util;

class File {
    public static function recursiveRead($src, $callable = null)
    {
        $dir = opendir($src);

        while(($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    self::recursiveRead($src . '/'. $file, $callable);
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
