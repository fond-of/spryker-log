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
}
