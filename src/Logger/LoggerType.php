<?php

namespace Logger;

use Logger\LogLevel;

/**
 * Абстрактный класс логгеров
 *
 */
abstract class LoggerType implements LoggerInterface {

    protected $levels = [
            LogLevel::LEVEL_ERROR,
            LogLevel::LEVEL_INFO,
            LogLevel::LEVEL_DEBUG,
            LogLevel::LEVEL_NOTICE,        
	];
    protected $enabled = false;

    public function __construct(array $params) {

        If (array_key_exists('is_enabled', $params)) {
            $this->enabled = (bool) $params['is_enabled'];
        }

        If (array_key_exists('levels', $params)) {
            $this->levels = (array) $params['levels'];
        }
    }

    public function enable() {
        $this->enabled = true;
    }

    public function disable() {
        $this->enabled = false;
    }

    /**
     * Функция, определяющая, будет ли запускаться данный логер при запуске из массива
     * 
     * @param int $logLevel
     * @return bool
     */
    public function isValid(int $logLevel): bool {
        return (($this->enabled == true) && (in_array($logLevel, $this->levels))) ? true : false;
    }

    abstract public function log(int $logLevel, string $msg);

    public function error(string $msg) {
        $this->log(LogLevel::LEVEL_ERROR, $msg);
    }

    public function info(string $msg) {
        $this->log(LogLevel::LEVEL_INFO, $msg);
    }

    public function debug(string $msg) {
        $this->log(LogLevel::LEVEL_DEBUG, $msg);
    }

    public function notice(string $msg) {
        $this->log(LogLevel::LEVEL_NOTICE, $msg);
    }

    protected function getFormatter() {
        return new Formatter;
    }

}
