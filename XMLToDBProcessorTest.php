<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'XMLToDBProcessor.php';
require_once 'XMLHandler.php';

use PHPUnit\Framework\TestCase;

class XMLToDBProcessorTest extends TestCase {
    public function testProcessXMLToDB_Success() {
        $mockXMLHandler = $this->getMockBuilder(XMLHandler::class)
            ->getMock();
        $mockXMLHandler->expects($this->once())
            ->method('readData');

        $mockDBHandler = $this->getMockBuilder(DBHandlerInterface::class)
            ->getMock();

        $mockLogger = $this->getMockBuilder(Logger::class)
            ->setConstructorArgs(['log'])
            ->getMock();

        $processor = new XMLToDBProcessor($mockXMLHandler, $mockDBHandler, $mockLogger);

        $processor->processXMLToDB('feed.xml');
    }
}