<?php

namespace Logger;

use Logger\LoggerType;
use Logger\LoggerInterface;
use Logger\LogLevel;

/**
 * Класс логгеров, записывающих в syslog
 *
 */
class SyslogLogger extends LoggerType implements LoggerInterface {

    public function log(int $logLevel, string $msg) {
        $msgFormatted = $this->getFormatter()->format($logLevel, $msg);
        $type = LogLevel::syslogConst($logLevel);
        
        syslog($type, $msgFormatted);
    }

}
