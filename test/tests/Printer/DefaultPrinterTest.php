<?php


use Aternos\Codex\Log\File\PathLogFile;
use Aternos\Codex\Log\Log;
use Aternos\Codex\Printer\DefaultPrinter;
use PHPUnit\Framework\TestCase;

class DefaultPrinterTest extends TestCase
{

    public function testPrint()
    {
        $logFile = new PathLogFile(__DIR__ . "/../../data/simple.log");
        $log = new Log();
        $log->setLogFile($logFile);
        $log->parse();

        $printer = new DefaultPrinter();
        $printer->setLog($log);
        $this->assertEquals($logFile->getContent(), trim($printer->print()));
    }
}
