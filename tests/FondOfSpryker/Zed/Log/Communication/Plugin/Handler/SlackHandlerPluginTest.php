<?php

namespace FondOfSpryker\Zed\Log\Communication\Plugin\Handler;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Log\Communication\LogCommunicationFactory;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\SlackHandler;

class SlackHandlerPluginTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Log\Communication\LogCommunicationFactory
     */
    protected $logCommunicationFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Monolog\Handler\SlackHandler
     */
    protected $slackHandlerMock;

    /**
     * @var \FondOfSpryker\Zed\Log\Communication\Plugin\Handler\SlackHandlerPlugin
     */
    protected $slackHandlerPlugin;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->logCommunicationFactory = $this->getMockBuilder(LogCommunicationFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->slackHandlerMock = $this->getMockBuilder(SlackHandler::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->slackHandlerPlugin = new SlackHandlerPlugin();
        $this->slackHandlerPlugin->setFactory($this->logCommunicationFactory);
    }

    /**
     * @return void
     */
    public function testIsHandling(): void
    {
        $record = [];

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createSlackHandler')
            ->willReturn($this->slackHandlerMock);

        $this->slackHandlerMock->expects($this->atLeastOnce())
            ->method('isHandling')
            ->with($record)
            ->willReturn(true);

        $this->assertTrue($this->slackHandlerPlugin->isHandling($record));
    }

    /**
     * @return void
     */
    public function testHandle(): void
    {
        $record = [];

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createSlackHandler')
            ->willReturn($this->slackHandlerMock);

        $this->slackHandlerMock->expects($this->atLeastOnce())
            ->method('handle')
            ->with($record)
            ->willReturn(true);

        $this->assertTrue($this->slackHandlerPlugin->handle($record));
    }

    /**
     * @return void
     */
    public function testHandleBatch(): void
    {
        $records = [];

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createSlackHandler')
            ->willReturn($this->slackHandlerMock);

        $this->slackHandlerMock->expects($this->atLeastOnce())
            ->method('handleBatch')
            ->with($records);

        $this->slackHandlerPlugin->handleBatch($records);
    }

    /**
     * @return void
     */
    public function testPushProcessor(): void
    {
        $callable = static function () {
        };

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createSlackHandler')
            ->willReturn($this->slackHandlerMock);

        $this->slackHandlerMock->expects($this->atLeastOnce())
            ->method('pushProcessor')
            ->with($callable);

        $this->slackHandlerPlugin->pushProcessor($callable);
    }

    /**
     * @return void
     */
    public function testPopProcessor(): void
    {
        $callable = static function () {
        };

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createSlackHandler')
            ->willReturn($this->slackHandlerMock);

        $this->slackHandlerMock->expects($this->atLeastOnce())
            ->method('popProcessor')
            ->willReturn($callable);

        $this->assertEquals($callable, $this->slackHandlerPlugin->popProcessor());
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
            ->method('createSlackHandler')
            ->willReturn($this->slackHandlerMock);

        $this->slackHandlerMock->expects($this->atLeastOnce())
            ->method('setFormatter')
            ->with($formatterMock)
            ->willReturn($this->slackHandlerMock);

        $this->assertEquals($this->slackHandlerMock, $this->slackHandlerPlugin->setFormatter($formatterMock));
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
            ->method('createSlackHandler')
            ->willReturn($this->slackHandlerMock);

        $this->slackHandlerMock->expects($this->atLeastOnce())
            ->method('getFormatter')
            ->willReturn($formatterMock);

        $this->slackHandlerPlugin->getFormatter();
    }

    /**
     * @return void
     */
    public function testClose(): void
    {
        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createSlackHandler')
            ->willReturn($this->slackHandlerMock);

        $this->slackHandlerMock->expects($this->atLeastOnce())
            ->method('close');

        $this->slackHandlerPlugin->close();
    }
}
