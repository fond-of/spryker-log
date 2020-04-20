<?php

namespace FondOfSpryker\Zed\Log\Communication;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\Log\LogConstants;
use FondOfSpryker\Zed\Log\LogConfig;
use Monolog\Handler\GelfHandler;
use Monolog\Logger;

class LogCommunicationFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\Log\Communication\LogCommunicationFactory
     */
    protected $logCommunicationFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Log\LogConfig
     */
    protected $logConfigMock;

    /**
     * @return void
     */
    protected function _before()
    {
        $this->logConfigMock = $this->getMockBuilder(LogConfig::class)
           ->disableOriginalConstructor()
           ->getMock();

        $this->logCommunicationFactory = new LogCommunicationFactory();
        $this->logCommunicationFactory->setConfig($this->logConfigMock);
    }

    /**
     * @return void
     */
    public function testCreateGelfHandler(): void
    {
        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getLogLevel')
            ->willReturn(Logger::INFO);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getLogstashHost')
            ->willReturn(LogConstants::LOGSTASH_HOST_VALUE);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getLogstashPort')
            ->willReturn(LogConstants::LOGSTASH_PORT_VALUE);

        $gelfHandler = $this->logCommunicationFactory->createGelfHandler();

        $this->assertInstanceOf(GelfHandler::class, $gelfHandler);
    }
}
