<?php

namespace Logger;

use Exception;

/**
 * Класс констант уровней логирования
 *
 */
abstract class LogLevel {

    const LEVEL_ERROR = 1;
    const LEVEL_INFO = 2;
    const LEVEL_DEBUG = 3;
    const LEVEL_NOTICE = 4;

    public static function syslogConst(int $level): int {

        switch ($level) {

            case self::LEVEL_ERROR :
                return 3;

            case self::LEVEL_INFO :
                return 6;

            case self::LEVEL_DEBUG :
                return 7;

            case self::LEVEL_NOTICE :
                return 5;

            default :
                throw new Exception("Не найден уровень логирования");
        }
    }

    public static function formatConst(int $level): string {

        switch ($level) {

            case self::LEVEL_ERROR :
                return 'ERROR';

            case self::LEVEL_INFO :
                return 'INFO';

            case self::LEVEL_DEBUG :
                return 'DEBUG';

            case self::LEVEL_NOTICE :
                return 'NOTICE';

            default :
                throw new Exception("Не найден уровень логирования");
        }
    }

}
