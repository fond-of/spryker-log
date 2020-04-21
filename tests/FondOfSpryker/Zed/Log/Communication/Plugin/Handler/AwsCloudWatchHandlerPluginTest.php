<?php

namespace FondOfSpryker\Zed\Log\Communication\Plugin\Handler;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Log\Communication\LogCommunicationFactory;
use Maxbanton\Cwh\Handler\CloudWatch;
use Monolog\Formatter\FormatterInterface;

class AwsCloudWatchHandlerPluginTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Log\Communication\LogCommunicationFactory
     */
    protected $logCommunicationFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Maxbanton\Cwh\Handler\CloudWatch
     */
    protected $awsCloudWatchHandlerMock;

    /**
     * @var \FondOfSpryker\Zed\Log\Communication\Plugin\Handler\AwsCloudWatchHandlerPlugin
     */
    protected $awsCloudWatchHandlerPlugin;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->logCommunicationFactory = $this->getMockBuilder(LogCommunicationFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->awsCloudWatchHandlerMock = $this->getMockBuilder(CloudWatch::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->awsCloudWatchHandlerPlugin = new AwsCloudWatchHandlerPlugin();
        $this->awsCloudWatchHandlerPlugin->setFactory($this->logCommunicationFactory);
    }

    /**
     * @return void
     */
    public function testIsHandling(): void
    {
        $record = [];

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createCloudWatchHandler')
            ->willReturn($this->awsCloudWatchHandlerMock);

        $this->awsCloudWatchHandlerMock->expects($this->atLeastOnce())
            ->method('isHandling')
            ->with($record)
            ->willReturn(true);

        $this->assertTrue($this->awsCloudWatchHandlerPlugin->isHandling($record));
    }

    /**
     * @return void
     */
    public function testHandle(): void
    {
        $record = [];

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createCloudWatchHandler')
            ->willReturn($this->awsCloudWatchHandlerMock);

        $this->awsCloudWatchHandlerMock->expects($this->atLeastOnce())
            ->method('handle')
            ->with($record)
            ->willReturn(true);

        $this->assertTrue($this->awsCloudWatchHandlerPlugin->handle($record));
    }

    /**
     * @return void
     */
    public function testHandleBatch(): void
    {
        $records = [];

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createCloudWatchHandler')
            ->willReturn($this->awsCloudWatchHandlerMock);

        $this->awsCloudWatchHandlerMock->expects($this->atLeastOnce())
            ->method('handleBatch')
            ->with($records);

        $this->awsCloudWatchHandlerPlugin->handleBatch($records);
    }

    /**
     * @return void
     */
    public function testPushProcessor(): void
    {
        $callable = static function () {
        };

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createCloudWatchHandler')
            ->willReturn($this->awsCloudWatchHandlerMock);

        $this->awsCloudWatchHandlerMock->expects($this->atLeastOnce())
            ->method('pushProcessor')
            ->with($callable);

        $this->awsCloudWatchHandlerPlugin->pushProcessor($callable);
    }

    /**
     * @return void
     */
    public function testPopProcessor(): void
    {
        $callable = static function () {
        };

        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createCloudWatchHandler')
            ->willReturn($this->awsCloudWatchHandlerMock);

        $this->awsCloudWatchHandlerMock->expects($this->atLeastOnce())
            ->method('popProcessor')
            ->willReturn($callable);

        $this->assertEquals($callable, $this->awsCloudWatchHandlerPlugin->popProcessor());
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
            ->method('createCloudWatchHandler')
            ->willReturn($this->awsCloudWatchHandlerMock);

        $this->awsCloudWatchHandlerMock->expects($this->atLeastOnce())
            ->method('setFormatter')
            ->with($formatterMock)
            ->willReturn($this->awsCloudWatchHandlerMock);

        $this->assertEquals($this->awsCloudWatchHandlerMock, $this->awsCloudWatchHandlerPlugin->setFormatter($formatterMock));
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
            ->method('createCloudWatchHandler')
            ->willReturn($this->awsCloudWatchHandlerMock);

        $this->awsCloudWatchHandlerMock->expects($this->atLeastOnce())
            ->method('getFormatter')
            ->willReturn($formatterMock);

        $this->awsCloudWatchHandlerPlugin->getFormatter();
    }

    /**
     * @return void
     */
    public function testClose(): void
    {
        $this->logCommunicationFactory->expects($this->atLeastOnce())
            ->method('createCloudWatchHandler')
            ->willReturn($this->awsCloudWatchHandlerMock);

        $this->awsCloudWatchHandlerMock->expects($this->atLeastOnce())
            ->method('close');

        $this->awsCloudWatchHandlerPlugin->close();
    }
}
