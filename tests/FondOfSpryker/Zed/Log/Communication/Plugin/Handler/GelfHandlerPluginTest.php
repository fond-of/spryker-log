<?php

namespace FondOfSpryker\Zed\Log\Communication\Plugin\Handler;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Log\Communication\LogCommunicationFactory;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\GelfHandler;

class GelfHandlerPluginTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Log\Communication\LogCommunicationFactory
     */
    protected $logCommunicationFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Monolog\Handler\GelfHandler
     */
    protected $gelfHandlerMock;

    /**
     * @var \FondOfSpryker\Zed\Log\Communication\Plugin\Handler\GelfHandlerPlugin
     */
    protected $gelfHandlerPlugin;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->logCommunicationFactory = $this->getMockBuilder(LogCommunicationFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->gelfHandlerMock = $this->getMockBuilder(GelfHandler::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->gelfHandlerPlugin = new GelfHandlerPlugin();
        $this->gelfHandlerPlugin->setFactory($this->logCommunicationFactory);
    }

    /**
     * @return void
     */
    public function testIsHandling(): void
    {
        $record = [];

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createGelfHandler')
            ->willReturn($this->gelfHandlerMock);

        $this->gelfHandlerMock->expects($this->atLeastOnce())
            ->method('isHandling')
            ->with($record)
            ->willReturn(true);

        $this->assertTrue($this->gelfHandlerPlugin->isHandling($record));
    }

    /**
     * @return void
     */
    public function testHandle(): void
    {
        $record = [];

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createGelfHandler')
            ->willReturn($this->gelfHandlerMock);

        $this->gelfHandlerMock->expects($this->atLeastOnce())
            ->method('handle')
            ->with($record)
            ->willReturn(true);

        $this->assertTrue($this->gelfHandlerPlugin->handle($record));
    }

    /**
     * @return void
     */
    public function testHandleBatch(): void
    {
        $records = [];

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createGelfHandler')
            ->willReturn($this->gelfHandlerMock);

        $this->gelfHandlerMock->expects($this->atLeastOnce())
            ->method('handleBatch')
            ->with($records);

        $this->gelfHandlerPlugin->handleBatch($records);
    }

    /**
     * @return void
     */
    public function testPushProcessor(): void
    {
        $callable = static function () {
        };

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createGelfHandler')
            ->willReturn($this->gelfHandlerMock);

        $this->gelfHandlerMock->expects($this->atLeastOnce())
            ->method('pushProcessor')
            ->with($callable);

        $this->gelfHandlerPlugin->pushProcessor($callable);
    }

    /**
     * @return void
     */
    public function testPopProcessor(): void
    {
        $callable = static function () {
        };

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createGelfHandler')
            ->willReturn($this->gelfHandlerMock);

        $this->gelfHandlerMock->expects($this->atLeastOnce())
            ->method('popProcessor')
            ->willReturn($callable);

        $this->assertEquals($callable, $this->gelfHandlerPlugin->popProcessor());
    }

    /**
     * @return void
     */
    public function testSetFormatter(): void
    {
        /** @var \Monolog\Formatter\FormatterInterface|\PHPUnit\Framework\MockObject\MockObject $formatterMock */
        $formatterMock = $this->getMockBuilder(FormatterInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createGelfHandler')
            ->willReturn($this->gelfHandlerMock);

        $this->gelfHandlerMock->expects($this->atLeastOnce())
            ->method('setFormatter')
            ->with($formatterMock)
            ->willReturn($this->gelfHandlerMock);

        $this->assertEquals($this->gelfHandlerMock, $this->gelfHandlerPlugin->setFormatter($formatterMock));
    }

    /**
     * @return void
     */
    public function testGetFormatter(): void
    {
        $formatterMock = $this->getMockBuilder(FormatterInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createGelfHandler')
            ->willReturn($this->gelfHandlerMock);

        $this->gelfHandlerMock->expects($this->atLeastOnce())
            ->method('getFormatter')
            ->willReturn($formatterMock);

        $this->gelfHandlerPlugin->getFormatter();
    }

    /**
     * @return void
     */
    public function testClose(): void
    {
        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createGelfHandler')
            ->willReturn($this->gelfHandlerMock);

        $this->gelfHandlerMock->expects($this->atLeastOnce())
            ->method('close');

        $this->gelfHandlerPlugin->close();
    }
}
