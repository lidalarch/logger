<?php

namespace Logger;

use Logger\LoggerType;
use Logger\LoggerInterface;

/**
 * Компонент для логирования
 *
 */
class Logger extends LoggerType implements LoggerInterface {

    /**
     * @var array
     */
    protected $loggers = [];

    public function __construct() {
        
    }

    /**
     * Функция, добавляющяя логеры в массив
     * 
     * @param LoggerType $logger
     * @return void
     */
    public function addLogger(LoggerType $logger) {
        $this->loggers[] = $logger;
    }

    /**
     * Функция, записывающяя переданное сообщение $msg теми из логеров,
     * которые enabled и у которых задан соответствующий уровень логирования $level
     * 
     * @param int $level
     * @param string $msg
     * @return void
     */
    public function log(int $level, string $msg) {

        foreach ($this->loggers as $logger) {
            if ($logger->isValid($level)) {

                $logger->log($level, $msg);
            }
        }
    }

}
