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

    /**
     * Specification:
     * - Username for slack.
     *
     * @api
     */
    public const SLACK_USERNAME = 'SLACK_USERNAME';

    /**
     * Specification:
     * - Default value for slack username.
     *
     * @api
     */
    public const SLACK_USERNAME_VALUE = 'spryker';

    /**
     * Specification:
     * - Slack channel where logs send to.
     *
     * @api
     */
    public const SLACK_CHANNEL = 'SLACK_CHANNEL';

    /**
     * Specification:
     * - Default value for slack channel.
     *
     * @api
     */
    public const SLACK_CHANNEL_VALUE = '#spryker';

    /**
     * Specification:
     * - Token for slack.
     *
     * @api
     */
    public const SLACK_TOKEN = 'SLACK_TOKEN';
}
