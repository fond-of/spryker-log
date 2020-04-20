<?php

namespace FondOfSpryker\Glue\Log;

use Codeception\Test\Unit;
use Monolog\Handler\GelfHandler;
use Monolog\Logger;

class LogFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\Log\LogFactory
     */
    protected $logFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\Log\LogConfig
     */
    protected $logConfig;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->logConfig = $this->getMockBuilder(LogConfig::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->logFactory = new LogFactory();

        $this->logFactory->setConfig($this->logConfig);
    }

    /**
     * @return void
     */
    public function testCreateGelfHandler(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('getLogLevel')
            ->willReturn(Logger::INFO);

        $this->logConfig->expects($this->atLeastOnce())
            ->method('getLogstashHost')
            ->willReturn('127.0.0.1');

        $this->logConfig->expects($this->atLeastOnce())
            ->method('getLogstashPort')
            ->willReturn(9200);

        $gelfHandler = $this->logFactory->createGelfHandler();

        $this->assertInstanceOf(GelfHandler::class, $gelfHandler);
    }
}
