<?php

namespace Logger;

use Logger\Formatter;
/**
 * Интерфейс всех типов логгеров
 * 
 */
interface LoggerInterface {
    
    public function log(int $level, string $msg);
    
    public function error(string $msg);
    
    public function info(string $msg);
    
    public function debug(string $msg);
    
    public function notice(string $msg);
    
}
