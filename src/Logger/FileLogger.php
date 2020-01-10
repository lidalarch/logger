<?php

namespace Logger;

use Logger\LoggerType;
use Logger\LoggerInterface;
use Exception;

/**
 * Класс логгеров, записывающих в файл
 *
 */
class FileLogger extends LoggerType implements LoggerInterface {

    protected $filename = '';

    public function __construct(array $params) {
        parent::__construct($params);

        If (array_key_exists('filename', $params)) {
            $this->filename = (string) $params['filename'];
        } else {
            throw new Exception("Не задан файл логирования");
        }
    }

    public function log(int $logLevel, string $msg) {
        $msgFormatted = $this->getFormatter()->format($logLevel, $msg);
        
        $fileRes = fopen($this->filename,'ab');
	fwrite ($fileRes, $msgFormatted);
	fclose ($fileRes);
    }

}
