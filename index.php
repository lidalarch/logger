<?php
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Задача: реализовать необходимые классы и методы для запуска данного файла
 *
 * 
 * Основные требования:
 * - аккуратность, чистота кода
 * - комментарии в коде для непонятных участков
 *
 * 
 * Результатом выполнение программы должно быть 8 записей в syslog (не обязательно) и 3 файла:
 *
 * application.log
 * *****************
 * 2016-05-30T09:50:57+00:00  001  ERROR  Error message
 * 2016-05-30T09:50:57+00:00  001  ERROR  Error message
 * 2016-05-30T09:50:57+00:00  002  INFO  Info message
 * 2016-05-30T09:50:57+00:00  002  INFO  Info message
 * 2016-05-30T09:50:57+00:00  003  DEBUG  Debug message
 * 2016-05-30T09:50:57+00:00  003  DEBUG  Debug message
 * 2016-05-30T09:50:57+00:00  004  NOTICE  Notice message
 * 2016-05-30T09:50:57+00:00  004  NOTICE  Notice message
 * 2016-05-30T09:50:57+00:00  002  INFO  Info message from FileLogger
 * 2016-05-30T09:50:57+00:00  002  INFO  Info message from FileLogger
 * *****************
 *
 * application.error.log
 * *****************
 * 2016-05-30T09:50:57+00:00  001  ERROR  Error message
 * 2016-05-30T09:50:57+00:00  001  ERROR  Error message
 * *****************
 *
 * application.info.log
 * *****************
 * 2016-05-30T09:50:57+00:00  002  INFO  Info message
 * 2016-05-30T09:50:57+00:00  002  INFO  Info message
 * *****************
 * 
 * Формат записи в файл:
 * {дата} {код уровня логирования} {уровень логирования} {сообщение}
 */

/**
 * Компонент для логирования
 */
$logger = new Logger\Logger();

/**
 * Логгер который все логи будет писать в файл application.log
 */
$fileLogger = new Logger\FileLogger([
	'is_enabled' => true,
	'filename' => __DIR__ . '/application.log',
]);

$logger->addLogger($fileLogger);

/**
 * Логгер который все ошибки будет писать в файл application.error.log
 */
$logger->addLogger(new Logger\FileLogger([
	'is_enabled' => true,
	'filename' => __DIR__ . '/application.error.log',
	'levels' => [
		Logger\LogLevel::LEVEL_ERROR,
	],
]));

/**
 * Логгер который все информационные логи будет писать в файл application.info.log
 */
$logger->addLogger(new Logger\FileLogger([
	'is_enabled' => true,
	'filename' => __DIR__ . '/application.info.log',
	'levels' => [
		Logger\LogLevel::LEVEL_INFO,
	],
]));

/**
 * Логгер который все debug логи записывает в syslog
 *
 * @see http://php.net/manual/ru/function.syslog.php
 */
$logger->addLogger(new Logger\SyslogLogger([
	'is_enabled' => true,
	'levels' => [
		Logger\LogLevel::LEVEL_DEBUG,
	],
]));

/**
 * Логгер который ничего не делает
 */
$logger->addLogger(new Logger\NullLogger([

]));

$logger->log(Logger\LogLevel::LEVEL_ERROR, 'Error message');
$logger->error('Error message');

$logger->log(Logger\LogLevel::LEVEL_INFO, 'Info message');
$logger->info('Info message');

$logger->log(Logger\LogLevel::LEVEL_DEBUG, 'Debug message');
$logger->debug('Debug message');

$logger->log(Logger\LogLevel::LEVEL_NOTICE, 'Notice message');
$logger->notice('Notice message');

$fileLogger->log(Logger\LogLevel::LEVEL_INFO, 'Info message from FileLogger');
$fileLogger->info('Info message from FileLogger');