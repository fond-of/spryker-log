<?php

namespace FondOfSpryker\Shared\Log;

use Spryker\Shared\Log\LogConstants as BaseLogConstants;

interface LogConstants extends BaseLogConstants
{
    /**
     * Specification:
     * - Host of Logstash.
     *
     * @api
     */
    public const LOGSTASH_HOST = 'LOGSTASH_HOST';

    /**
     * Specification:
     * - Default value for Logstash host.
     *
     * @api
     */
    public const LOGSTASH_HOST_VALUE = 'logstash';

    /**
     * Specification:
     * - Port of Logstash.
     *
     * @api
     */
    public const LOGSTASH_PORT = 'LOGSTASH_PORT';

    /**
     * Specification:
     * - Default value for Logstash port.
     *
     * @api
     */
    public const LOGSTASH_PORT_VALUE = 50332;
}
