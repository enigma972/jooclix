<?php

namespace app\core\Terminal;

Interface TerminalInterface
{
    /**
     * @param mixed $var
     */
    public function print($var);

    /**
     * @param mixed $var
     */
    public function println($var);

    /**
     * @param mixed $var
     */
    public function input($var = '');

    /**
     * @param mixed $pathname
     * @param int $mode
     * @param bool $recursive
     * @return
     */
    public function mkdir($pathname, $mode = 0777, $recursive = true);

    /**
     * @param mixed $filename
     * @param mixed $data
     */
    public function writeInFile($filename, $data);

    /**
     * @param mixed $dirname
     */
    public function removedir($dirname);
}