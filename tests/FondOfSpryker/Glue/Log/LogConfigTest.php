<?php

namespace FondOfSpryker\Glue\Log;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\Log\LogConstants;
use Monolog\Logger;

class LogConfigTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\Log\LogConfig|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $logConfig;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->logConfig = $this->getMockBuilder(LogConfig::class)
            ->onlyMethods(['get'])
            ->getMock();
    }

    /**
     * @return void
     */
    public function testGetDefaultLogstashHost(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::LOGSTASH_HOST, LogConstants::LOGSTASH_HOST_VALUE)
            ->willReturn(LogConstants::LOGSTASH_HOST_VALUE);

        $this->assertEquals(LogConstants::LOGSTASH_HOST_VALUE, $this->logConfig->getLogstashHost());
    }

    /**
     * @return void
     */
    public function testGetDefaultLogstasPort(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::LOGSTASH_PORT, LogConstants::LOGSTASH_PORT_VALUE)
            ->willReturn(LogConstants::LOGSTASH_PORT_VALUE);

        $this->assertEquals(LogConstants::LOGSTASH_PORT_VALUE, $this->logConfig->getLogstashPort());
    }

    /**
     * @return void
     */
    public function testGetCustomLogstashHost(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::LOGSTASH_HOST, LogConstants::LOGSTASH_HOST_VALUE)
            ->willReturn('logstash.custom');

        $this->assertEquals('logstash.custom', $this->logConfig->getLogstashHost());
    }

    /**
     * @return void
     */
    public function testGetCustomLogstashPort(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::LOGSTASH_PORT, LogConstants::LOGSTASH_PORT_VALUE)
            ->willReturn(12345);

        $this->assertEquals(12345, $this->logConfig->getLogstashPort());
    }

    /**
     * @return void
     */
    public function testGetSlackUsername(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::SLACK_USERNAME, LogConstants::SLACK_USERNAME_VALUE)
            ->willReturn(LogConstants::SLACK_USERNAME_VALUE);

        $this->assertEquals(LogConstants::SLACK_USERNAME_VALUE, $this->logConfig->getSlackUsername());
    }

    /**
     * @return void
     */
    public function testGetSlackToken(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::SLACK_TOKEN, '')
            ->willReturn('');

        $this->assertEquals('', $this->logConfig->getSlackToken());
    }

    /**
     * @return void
     */
    public function testGetSlackChannel(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::SLACK_CHANNEL, LogConstants::SLACK_CHANNEL_VALUE)
            ->willReturn(LogConstants::SLACK_CHANNEL_VALUE);

        $this->assertEquals(LogConstants::SLACK_CHANNEL_VALUE, $this->logConfig->getSlackChannel());
    }

    /**
     * @return void
     */
    public function testGetCustomSlackUsername(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::SLACK_USERNAME, LogConstants::SLACK_USERNAME_VALUE)
            ->willReturn('oryx');

        $this->assertEquals('oryx', $this->logConfig->getSlackUsername());
    }

    /**
     * @return void
     */
    public function testGetCustomSlackToken(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::SLACK_TOKEN, '')
            ->willReturn('xyxfrf43534fnsduliuf34');

        $this->assertEquals('xyxfrf43534fnsduliuf34', $this->logConfig->getSlackToken());
    }

    /**
     * @return void
     */
    public function testGetCustomSlackChannel(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::SLACK_CHANNEL, LogConstants::SLACK_CHANNEL_VALUE)
            ->willReturn('#oryx');

        $this->assertEquals('#oryx', $this->logConfig->getSlackChannel());
    }

    /**
     * @return void
     */
    public function testGetAwsRegion(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_REGION, LogConstants::AWS_REGION_DEFAULT_VALUE)
            ->willReturn(LogConstants::AWS_REGION_DEFAULT_VALUE);

        $this->assertEquals(LogConstants::AWS_REGION_DEFAULT_VALUE, $this->logConfig->getAwsRegion());
    }

    /**
     * @return void
     */
    public function testGetAwsVersion(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_VERSION, LogConstants::AWS_VERSION_DEFAULT_VALUE)
            ->willReturn(LogConstants::AWS_VERSION_DEFAULT_VALUE);

        $this->assertEquals(LogConstants::AWS_VERSION_DEFAULT_VALUE, $this->logConfig->getAwsVersion());
    }

    /**
     * @return void
     */
    public function testGetAwsKey(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_KEY, '')
            ->willReturn('');

        $this->assertEquals('', $this->logConfig->getAwsKey());
    }

    /**
     * @return void
     */
    public function testGetAwsSecret(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_SECRET, '')
            ->willReturn('');

        $this->assertEquals('', $this->logConfig->getAwsSecret());
    }

    /**
     * @return void
     */
    public function testGetAwsLogGroupName(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_GROUP_NAME_GLUE, LogConstants::AWS_LOG_GROUP_NAME_GLUE_DEFAULT_VALUE)
            ->willReturn(LogConstants::AWS_LOG_GROUP_NAME_GLUE_DEFAULT_VALUE);

        $this->assertEquals(
            LogConstants::AWS_LOG_GROUP_NAME_GLUE_DEFAULT_VALUE,
            $this->logConfig->getAwsLogGroupName()
        );
    }

    /**
     * @return void
     */
    public function testGetAwsLogStreamName(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_STREAM_NAME_GLUE, LogConstants::AWS_LOG_STREAM_NAME_GLUE_DEFAULT_VALUE)
            ->willReturn(LogConstants::AWS_LOG_STREAM_NAME_GLUE_DEFAULT_VALUE);

        $this->assertEquals(
            LogConstants::AWS_LOG_STREAM_NAME_GLUE_DEFAULT_VALUE,
            $this->logConfig->getAwsLogStreamName()
        );
    }

    /**
     * @return void
     */
    public function testGetAwsLogRetentionDays(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_RETENTION_DAYS, LogConstants::AWS_LOG_RETENTION_DAYS_DEFAULT_VALUE)
            ->willReturn(LogConstants::AWS_LOG_RETENTION_DAYS_DEFAULT_VALUE);

        $this->assertEquals(
            LogConstants::AWS_LOG_RETENTION_DAYS_DEFAULT_VALUE,
            $this->logConfig->getAwsLogRetentionDays()
        );
    }

    /**
     * @return void
     */
    public function testGetAwsLogLevel(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_LEVEL_GLUE, LogConstants::AWS_LOG_LEVEL_GLUE_DEFAULT_VALUE)
            ->willReturn(LogConstants::AWS_LOG_LEVEL_GLUE_DEFAULT_VALUE);

        $this->assertEquals(
            LogConstants::AWS_LOG_LEVEL_GLUE_DEFAULT_VALUE,
            $this->logConfig->getAwsLogLevel()
        );
    }

    /**
     * @return void
     */
    public function testGetAwsLogTags(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_TAGS, LogConstants::AWS_LOG_TAGS_DEFAULT_VALUE)
            ->willReturn(LogConstants::AWS_LOG_TAGS_DEFAULT_VALUE);

        $this->assertEquals(
            LogConstants::AWS_LOG_TAGS_DEFAULT_VALUE,
            $this->logConfig->getAwsLogTags()
        );
    }

    /**
     * @return void
     */
    public function testGetAwsLogBatchSize(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_BATCH_SIZE, LogConstants::AWS_LOG_BATCH_SIZE_DEFAULT_VALUE)
            ->willReturn(LogConstants::AWS_LOG_BATCH_SIZE_DEFAULT_VALUE);

        $this->assertEquals(
            LogConstants::AWS_LOG_BATCH_SIZE_DEFAULT_VALUE,
            $this->logConfig->getAwsLogBatchSize()
        );
    }

    /**
     * @return void
     */
    public function testGetCustomAwsRegion(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_REGION, LogConstants::AWS_REGION_DEFAULT_VALUE)
            ->willReturn(LogConstants::AWS_REGION_DEFAULT_VALUE);

        $this->assertEquals(LogConstants::AWS_REGION_DEFAULT_VALUE, $this->logConfig->getAwsRegion());
    }

    /**
     * @return void
     */
    public function testGetCustomAwsVersion(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_VERSION, LogConstants::AWS_VERSION_DEFAULT_VALUE)
            ->willReturn('2012-10-17');

        $this->assertEquals('2012-10-17', $this->logConfig->getAwsVersion());
    }

    /**
     * @return void
     */
    public function testGetCustomAwsKey(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_KEY, '')
            ->willReturn('key');

        $this->assertEquals('key', $this->logConfig->getAwsKey());
    }

    /**
     * @return void
     */
    public function testGetCustomAwsSecret(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_SECRET, '')
            ->willReturn('secret');

        $this->assertEquals('secret', $this->logConfig->getAwsSecret());
    }

    /**
     * @return void
     */
    public function testGetCustomAwsLogGroupName(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_GROUP_NAME_GLUE, LogConstants::AWS_LOG_GROUP_NAME_GLUE_DEFAULT_VALUE)
            ->willReturn('oryx-glue');

        $this->assertEquals(
            'oryx-glue',
            $this->logConfig->getAwsLogGroupName()
        );
    }

    /**
     * @return void
     */
    public function testGetCustomAwsLogStreamName(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_STREAM_NAME_GLUE, LogConstants::AWS_LOG_STREAM_NAME_GLUE_DEFAULT_VALUE)
            ->willReturn('ec2-instance');

        $this->assertEquals(
            'ec2-instance',
            $this->logConfig->getAwsLogStreamName()
        );
    }

    /**
     * @return void
     */
    public function testGetCustomAwsLogRetentionDays(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_RETENTION_DAYS, LogConstants::AWS_LOG_RETENTION_DAYS_DEFAULT_VALUE)
            ->willReturn(15);

        $this->assertEquals(
            15,
            $this->logConfig->getAwsLogRetentionDays()
        );
    }

    /**
     * @return void
     */
    public function testGetCustomAwsLogLevel(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_LEVEL_GLUE, LogConstants::AWS_LOG_LEVEL_GLUE_DEFAULT_VALUE)
            ->willReturn(Logger::INFO);

        $this->assertEquals(
            Logger::INFO,
            $this->logConfig->getAwsLogLevel()
        );
    }

    /**
     * @return void
     */
    public function testGetCustomAwsLogTags(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_TAGS, LogConstants::AWS_LOG_TAGS_DEFAULT_VALUE)
            ->willReturn(['lorem']);

        $this->assertEquals(
            ['lorem'],
            $this->logConfig->getAwsLogTags()
        );
    }

    /**
     * @return void
     */
    public function testGetCustomAwsLogBatchSize(): void
    {
        $this->logConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(LogConstants::AWS_LOG_BATCH_SIZE, LogConstants::AWS_LOG_BATCH_SIZE_DEFAULT_VALUE)
            ->willReturn(2);

        $this->assertEquals(
            2,
            $this->logConfig->getAwsLogBatchSize()
        );
    }
}
