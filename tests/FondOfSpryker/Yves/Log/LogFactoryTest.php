<?php

namespace FondOfSpryker\Yves\Log;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\Log\LogConstants;
use FondOfSpryker\Shared\Log\Processor\ServerProcessor;
use Maxbanton\Cwh\Handler\CloudWatch;
use Monolog\Handler\GelfHandler;
use Monolog\Handler\SlackHandler;
use Monolog\Logger;

class LogFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Yves\Log\LogFactory
     */
    protected $logFactory;

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

        $this->logFactory = new LogFactory();
        $this->logFactory->setConfig($this->logConfigMock);
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

        $gelfHandler = $this->logFactory->createGelfHandler();

        $this->assertInstanceOf(GelfHandler::class, $gelfHandler);
    }

    /**
     * @return void
     */
    public function testCreateSlackHandler(): void
    {
        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getLogLevel')
            ->willReturn(Logger::INFO);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getSlackToken')
            ->willReturn('slack_token');

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getSlackUsername')
            ->willReturn(LogConstants::SLACK_USERNAME_VALUE);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getSlackChannel')
            ->willReturn(LogConstants::SLACK_CHANNEL_VALUE);

        $slackHandler = $this->logFactory->createSlackHandler();

        $this->assertInstanceOf(SlackHandler::class, $slackHandler);
    }

    /**
     * @return void
     */
    public function testCreateCloudWatchHandler(): void
    {
        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getAwsRegion')
            ->willReturn(LogConstants::AWS_REGION_DEFAULT_VALUE);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getAwsVersion')
            ->willReturn(LogConstants::AWS_VERSION_DEFAULT_VALUE);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getAwsKey')
            ->willReturn('aws_key');

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getAwsSecret')
            ->willReturn('aws_secret');

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getAwsLogGroupName')
            ->willReturn(LogConstants::AWS_LOG_GROUP_NAME_YVES_DEFAULT_VALUE);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getAwsLogStreamName')
            ->willReturn(LogConstants::AWS_LOG_STREAM_NAME_YVES_DEFAULT_VALUE);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getAwsLogBatchSize')
            ->willReturn(LogConstants::AWS_LOG_BATCH_SIZE_DEFAULT_VALUE);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getAwsLogRetentionDays')
            ->willReturn(LogConstants::AWS_LOG_RETENTION_DAYS_DEFAULT_VALUE);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getAwsLogTags')
            ->willReturn(LogConstants::AWS_LOG_TAGS_DEFAULT_VALUE);

        $this->logConfigMock->expects($this->atLeastOnce())
            ->method('getAwsLogLevel')
            ->willReturn(Logger::INFO);

        $cloudWatchHandler = $this->logFactory->createCloudWatchHandler();

        $this->assertInstanceOf(CloudWatch::class, $cloudWatchHandler);
    }

    /**
     * @return void
     */
    public function testCreateServerProcessorPublic(): void
    {
        $serverProcessorPublic = $this->logFactory->createServerProcessorPublic();

        $this->assertInstanceOf(ServerProcessor::class, $serverProcessorPublic);
    }
}
