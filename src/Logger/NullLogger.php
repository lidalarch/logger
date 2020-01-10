<?php

namespace Logger;

use Logger\LoggerType;
use Logger\LoggerInterface;

/**
 * Класс логгеров, которые ничего не делаеют
 *
 */
class NullLogger extends LoggerType implements LoggerInterface {

    public function __construct(array $params) {
        
    }

    public function log(int $logLevel, string $msg) {
        
    }

    public function error(string $msg) {
        
    }

    public function info(string $msg) {
        
    }

    public function debug(string $msg) {
        
    }

    public function notice(string $msg) {
        
    }

    protected function getFormatter() {
        
    }

}
