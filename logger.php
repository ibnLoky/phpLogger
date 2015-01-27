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
      private function __construct()
      {
        $level = 0;
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
        self::getInstance()->log($lbl, $msg);
      }

      private function _log()
      {
        if ($lvl != LOGGER_IN && $lvl != LOGGER_OUT && $lvl != LOGGER_TRACE)
            throw new Exception("Unknown log event");
        if ($lvl == LOGGER_IN) {
            $level += 1;
            //TODO : log
            }
        if ($lvl == LOGGER_OUT) {
            if ($level == 0)
                throw new Exception("Incorrect log event");
            else {
            //TODO : Log
            $level -= 1;
            }
        else if ($lvl == LOGGER_TRACE)
            /TODO: log
        }
      }
}