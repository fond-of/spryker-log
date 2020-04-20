<?php

namespace FondOfSpryker\Yves\Log;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\Log\LogConstants;
use Monolog\Handler\GelfHandler;
use Monolog\Logger;

class LogFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Yves\Log\LogFactory
     */
    protected $logCommunicationFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Yves\Log\LogConfig
     */
    protected $logConfigMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->logConfigMock = $this->getMockBuilder(LogConfig::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->logCommunicationFactory = new LogFactory();
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
