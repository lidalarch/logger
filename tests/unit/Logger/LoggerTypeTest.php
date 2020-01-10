<?php

use PHPUnit\Framework\TestCase;
use Logger\LogLevel;
use Logger\FileLogger;

class LoggerTypeTest extends TestCase {

    public function testIsValid() {

        $logger = new FileLogger([
            'is_enabled' => true,
            'filename' => __DIR__ . '/application.info.log',
            'levels' => [
                LogLevel::LEVEL_INFO,
            ],
        ]);
        $logLevel = LogLevel::LEVEL_INFO;

        $val = $logger->isValid($logLevel);
        
        $this->assertIsBool($val);
        $this->assertTrue($val);
        
        $logLevel = LogLevel::LEVEL_ERROR;

        $val = $logger->isValid($logLevel);
        
        $this->assertIsBool($val);
        $this->assertFalse($val);
    }

}
