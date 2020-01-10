<?php

namespace Logger;

use Logger\LogLevel;

/**
 * Класс, форматирующий строки записей логов  в виде 
 * {дата} {код уровня логирования} {уровень логирования} {сообщение}
 * 
 * @example 2016-05-30T09:50:57+00:00  004  NOTICE  Notice message
 */
class Formatter {

    public function format(int $logLevel, string $msg): string {
        //date_default_timezone_set('ASIA/Novosibirsk');
        $date = date(DATE_ATOM);
        $type = LogLevel::formatConst($logLevel);
        $format = '%1$s  %2$03d  %3$s  %4$s';
        $msgFormatted = sprintf($format, $date, $logLevel, $type, $msg) . PHP_EOL;

        return $msgFormatted;
    }

}
