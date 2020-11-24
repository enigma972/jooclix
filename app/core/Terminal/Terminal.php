<?php

namespace app\core\Terminal;

/**
 * @package Terminal
 */
class Terminal implements TerminalInterface
{
    protected $commands = array();
    protected $arguments = array();

    public function __construct($command, $arguments)
    {
        if (in_array(strtolower($command), $this->commands)) {
            $this->parseArgs($arguments);
            if (preg_match('#(.*):(.*)#', $command)) {
                $command = explode(':', $command);
                $command = ucfirst($command[0]) . ucfirst($command[1]);
            }
            $this->$command($this->arguments);
        } else {
            echo "\tCommand \"$command\" is not defined";
        }
    }

    /**
     * @inheritdoc
     */
    public function print($var)
    {
        echo $var;
    }

    /**
     * @inheritdoc
     */
    public function println($var)
    {
        echo "\n", $var, "\n";
    }

    /**
     * @inheritdoc
     */
    public function input($text = '')
    {
        echo "\n", $text;
        return trim(fgets(STDIN, 1024));
    }

    /**
     * @inheritdoc
     */
    public function mkdir($pathname, $mode = 0777, $recursive = true) {
        mkdir($pathname, $mode, $recursive);
    }

    /**
     * @inheritdoc
     */
    public function writeInFile($filename, $data)
    {
        file_put_contents($filename, $data);  //, '', '');
    }

    /**
     * @inheritdoc
     */
    public function removedir($dirname)
    {
        // TODO: Implement removedir() method.
    }

    /**
     * @param $arguments array
     * @return void
     */
    public function parseArgs(array $arguments){
        foreach ($arguments as $argument) {
            if (preg_match('#(.*):(.*)#', $argument)) {
                $argument = explode(':', $argument);
                $this->arguments[$argument[0]] = $argument[1];
            }
        }
    }

}