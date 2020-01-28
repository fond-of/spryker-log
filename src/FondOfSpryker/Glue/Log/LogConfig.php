<?php

namespace FondOfSpryker\Glue\Log;

use FondOfSpryker\Shared\Log\LogConstants;
use Spryker\Glue\Log\LogConfig as BaseLogConfig;

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
}
