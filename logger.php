<?php
/**
 * Created by PhpStorm.
 * User: ib
 * Date: 1/27/15
 * Time: 12:29 PM
 */
define("LOG_FILE", "./log.txt");
define("LOGGER_IN", 1);
define("LOGGER_OUT", -1);
define("LOGGER_TRACE", 0);

class logger {

      protected static $_instance;
      private $level;
      private $file;

      private function __construct()
      {
        $level = 0;
        $file = fopen(LOG_FILE, a+) or die("could not open log file");
      }

      public function getInstance()
      {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
      }

      public static function log($lvl, $msg)
      {
        self::getInstance()->_log($lvl, $msg);
      }

      private function _log()
      {
        if ($lvl != LOGGER_IN && $lvl != LOGGER_OUT && $lvl != LOGGER_TRACE)
            throw new Exception("Unknown log event");
        if ($lvl == LOGGER_IN) {
            $level += 1;
            $string = "";
            for ($i = 0; $i != $level; ++$i)
                $string .= ">>";
            $string .= $msg;
            fwirte($this->$file, $string);
        }
        if ($lvl == LOGGER_OUT) {
            if ($level == 0)
                throw new Exception("Incorrect log event");
            else {
            for ($i = 0; $i != $level; ++$i)
                $string .= "<<";
            $string .= $msg;
            fwirte($this->$file, $string);
            $level -= 1;
            }
        }
        else if ($lvl == LOGGER_TRACE) {
            for ($i = 0; $i != $level; ++$i)
                $string .= "::";
            $string .= $msg;
            fwirte($this->$file, $string);
        }
      }
  }