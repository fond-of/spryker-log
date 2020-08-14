<?php

namespace FondOfSpryker\Yves\Log;

use FondOfSpryker\Shared\Log\LogConstants;
use Spryker\Yves\Log\LogConfig as BaseLogConfig;

class LogConfig extends BaseLogConfig
{
    /**
     * @return string
     */
    public function getLogstashHost(): string
    {
        return $this->get(LogConstants::LOGSTASH_HOST, LogConstants::LOGSTASH_HOST_VALUE);
    }

    /**
     * @return int
     */
    public function getLogstashPort(): int
    {
        return $this->get(LogConstants::LOGSTASH_PORT, LogConstants::LOGSTASH_PORT_VALUE);
    }

    /**
     * @return string
     */
    public function getSlackUsername(): string
    {
        return $this->get(LogConstants::SLACK_USERNAME, LogConstants::SLACK_USERNAME_VALUE);
    }

    /**
     * @return string
     */
    public function getSlackChannel(): string
    {
        return $this->get(LogConstants::SLACK_CHANNEL, LogConstants::SLACK_CHANNEL_VALUE);
    }

    /**
     * @return string
     */
    public function getSlackToken(): string
    {
        return $this->get(LogConstants::SLACK_TOKEN, '');
    }

    /**
     * @return string
     */
    public function getAwsRegion(): string
    {
        return $this->get(LogConstants::AWS_REGION, LogConstants::AWS_REGION_DEFAULT_VALUE);
    }

    /**
     * @return string
     */
    public function getAwsVersion(): string
    {
        return $this->get(LogConstants::AWS_VERSION, LogConstants::AWS_VERSION_DEFAULT_VALUE);
    }

    /**
     * @return string
     */
    public function getAwsKey(): string
    {
        return $this->get(LogConstants::AWS_KEY, '');
    }

    /**
     * @return string
     */
    public function getAwsSecret(): string
    {
        return $this->get(LogConstants::AWS_SECRET, '');
    }

    /**
     * @return string
     */
    public function getAwsLogGroupName(): string
    {
        return $this->get(LogConstants::AWS_LOG_GROUP_NAME_YVES, LogConstants::AWS_LOG_GROUP_NAME_YVES_DEFAULT_VALUE);
    }

    /**
     * @return string
     */
    public function getAwsLogStreamName(): string
    {
        return $this->get(LogConstants::AWS_LOG_STREAM_NAME_YVES, LogConstants::AWS_LOG_STREAM_NAME_YVES_DEFAULT_VALUE);
    }

    /**
     * @return int|null
     */
    public function getAwsLogRetentionDays(): ?int
    {
        return $this->get(LogConstants::AWS_LOG_RETENTION_DAYS, LogConstants::AWS_LOG_RETENTION_DAYS_DEFAULT_VALUE);
    }

    /**
     * @return int
     */
    public function getAwsLogLevel(): int
    {
        return $this->get(LogConstants::AWS_LOG_LEVEL_YVES, LogConstants::AWS_LOG_LEVEL_YVES_DEFAULT_VALUE);
    }

    /**
     * @return array
     */
    public function getAwsLogTags(): array
    {
        return $this->get(LogConstants::AWS_LOG_TAGS, LogConstants::AWS_LOG_TAGS_DEFAULT_VALUE);
    }

    /**
     * @return int
     */
    public function getAwsLogBatchSize(): int
    {
        return $this->get(LogConstants::AWS_LOG_BATCH_SIZE, LogConstants::AWS_LOG_BATCH_SIZE_DEFAULT_VALUE);
    }

    /**
     * @return string
     */
    public function getLogFormatterType(): string
    {
        return $this->get(LogConstants::AWS_LOG_FORMATTER_TYPE_YVES, LogConstants::LOG_FORMATTER_TYPE_LINE);
    }
}
