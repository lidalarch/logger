<?php

use PHPUnit\Framework\TestCase;
use Logger\Formatter;

class FormatterTest extends TestCase {

    public function testFormat() {

        $formatter = new Formatter;

        $logLevel = 4;
        $msg = 'Notice message';
        $formated = $formatter->format($logLevel, $msg);

        $this->assertIsString($formated);
        $this->assertStringContainsString('  004  NOTICE  Notice message', $formated);
        $pattern = '/^20\d\d-\d\d-\d\dT\d\d:\d\d:\d\d\+\d\d:\d\d  004  NOTICE  Notice message/';
        $this->assertRegExp($pattern, $formated);
    }

}
