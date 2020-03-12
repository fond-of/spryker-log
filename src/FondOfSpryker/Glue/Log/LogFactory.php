<?php

namespace FondOfSpryker\Glue\Log;

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use FondOfSpryker\Shared\Log\LogConstants;
use Gelf\Publisher;
use Gelf\PublisherInterface;
use Gelf\Transport\AbstractTransport;
use Gelf\Transport\UdpTransport;
use Maxbanton\Cwh\Handler\CloudWatch;
use Monolog\Formatter\GelfMessageFormatter;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\GelfHandler;
use Monolog\Handler\SlackHandler;
use Spryker\Glue\Log\LogFactory as BaseLogFactory;

/**
 * @method \FondOfSpryker\Glue\Log\LogConfig getConfig()
 */
class LogFactory extends BaseLogFactory
{
    /**
     * @return \Monolog\Handler\HandlerInterface|\Monolog\Handler\SlackHandler
     */
    public function createSlackHandler(): SlackHandler
    {
        $slackHandler = new SlackHandler(
            $this->getConfig()->getSlackToken(),
            $this->getConfig()->getSlackChannel(),
            $this->getConfig()->getSlackUsername(),
            true,
            null,
            $this->getConfig()->getLogLevel()
        );

        return $slackHandler;
    }

    /**
     * @return \Maxbanton\Cwh\Handler\CloudWatch
     * @throws \Exception
     */
    public function createCloudWatchHandler(): CloudWatch
    {
        $handler = new CloudWatch(
            $this->createCloudWatchLogsClient(),
            $this->getConfig()->getAwsLogGroupName(),
            $this->getConfig()->getAwsLogStreamName(),
            $this->getConfig()->getAwsLogRetentionDays(),
            $this->getConfig()->getAwsLogBatchSize(),
            $this->getConfig()->getAwsLogTags(),
            $this->getConfig()->getAwsLogLevel()
        );
        $handler->setFormatter($this->createJsonFormatter());

        return $handler;
    }

    /**
     * @return \Monolog\Handler\HandlerInterface|\Monolog\Handler\GelfHandler
     */
    public function createGelfHandler(): GelfHandler
    {
        $streamHandler = new GelfHandler(
            $this->createPublisher(),
            $this->getConfig()->getLogLevel()
        );

        $streamHandler->setFormatter($this->createGelfMessageFormatter());

        return $streamHandler;
    }

    /**
     * @return \Monolog\Formatter\FormatterInterface|\Monolog\Formatter\GelfMessageFormatter
     */
    protected function createGelfMessageFormatter(): GelfMessageFormatter
    {
        return new GelfMessageFormatter(APPLICATION);
    }

    /**
     * @return \Gelf\PublisherInterface
     */
    protected function createPublisher(): PublisherInterface
    {
        return new Publisher($this->createUdpTransport());
    }

    /**
     * @return \Gelf\Transport\AbstractTransport
     */
    protected function createUdpTransport(): AbstractTransport
    {
        $host = $this->getConfig()->getLogstashHost();
        $port = $this->getConfig()->getLogstashPort();

        return new UdpTransport($host, $port);
    }

    protected function createCloudWatchLogsClient(): CloudWatchLogsClient
    {
        return new CloudWatchLogsClient($this->createAwsSdkParams());
    }

    /**
     * @return array
     */
    protected function createAwsSdkParams(): array
    {
        return [
            LogConstants::AWS_SDK_PARAM_REGION => $this->getConfig()->getAwsRegion(),
            LogConstants::AWS_SDK_PARAM_VERSION => $this->getConfig()->getAwsVersion(),
            LogConstants::AWS_SDK_PARAM_CREDENTIALS => [
                LogConstants::AWS_SDK_PARAM_KEY => $this->getConfig()->getAwsKey(),
                LogConstants::AWS_SDK_PARAM_SECRET => $this->getConfig()->getAwsSecret(),
            ],
        ];
    }

    /**
     * @return \Monolog\Formatter\JsonFormatter
     */
    protected function createJsonFormatter(): JsonFormatter
    {
        return new JsonFormatter();
    }
}
