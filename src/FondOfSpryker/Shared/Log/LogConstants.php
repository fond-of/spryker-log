<?php

namespace FondOfSpryker\Shared\Log;

use Monolog\Logger;
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

    //------------ AWS CloudWatch Logs
    public const AWS_REGION = 'AWS_REGION';
    public const AWS_REGION_DEFAULT_VALUE = 'eu-west-1';

    public const AWS_VERSION = 'AWS_VERSION';
    public const AWS_VERSION_DEFAULT_VALUE = 'latest';

    public const AWS_KEY = 'AWS_KEY';

    public const AWS_SECRET = 'AWS_SECRET';

    public const AWS_LOG_BATCH_SIZE = 'AWS_LOG_BATCH_SIZE';
    public const AWS_LOG_BATCH_SIZE_DEFAULT_VALUE = 1;

    public const AWS_LOG_TAGS = 'AWS_LOG_TAGS';
    public const AWS_LOG_TAGS_DEFAULT_VALUE = [];

    public const AWS_LOG_LEVEL_YVES = 'AWS_LOG_LEVEL_YVES';
    public const AWS_LOG_LEVEL_YVES_DEFAULT_VALUE = Logger::CRITICAL;

    public const AWS_LOG_LEVEL_ZED = 'AWS_LOG_LEVEL_ZED';
    public const AWS_LOG_LEVEL_ZED_DEFAULT_VALUE = Logger::CRITICAL;

    public const AWS_LOG_LEVEL_GLUE = 'AWS_LOG_LEVEL_GLUE';
    public const AWS_LOG_LEVEL_GLUE_DEFAULT_VALUE = Logger::CRITICAL;

    public const AWS_LOG_GROUP_NAME_ZED = 'AWS_LOG_GROUP_NAME_ZED';
    public const AWS_LOG_GROUP_NAME_ZED_DEFAULT_VALUE = 'spryker-zed';

    public const AWS_LOG_GROUP_NAME_YVES = 'AWS_LOG_GROUP_NAME_YVES';
    public const AWS_LOG_GROUP_NAME_YVES_DEFAULT_VALUE = 'spryker-yves';

    public const AWS_LOG_GROUP_NAME_GLUE = 'AWS_LOG_GROUP_NAME_GLUE';
    public const AWS_LOG_GROUP_NAME_GLUE_DEFAULT_VALUE = 'spryker-glue';

    public const AWS_LOG_STREAM_NAME_ZED = 'AWS_LOG_STREAM_NAME_ZED';
    public const AWS_LOG_STREAM_NAME_ZED_DEFAULT_VALUE = 'ec2-instance-zed';

    public const AWS_LOG_STREAM_NAME_YVES = 'AWS_LOG_STREAM_NAME_YVES';
    public const AWS_LOG_STREAM_NAME_YVES_DEFAULT_VALUE = 'ec2-instance-yves';

    public const AWS_LOG_STREAM_NAME_GLUE = 'AWS_LOG_STREAM_NAME_GLUE';
    public const AWS_LOG_STREAM_NAME_GLUE_DEFAULT_VALUE = 'ec2-instance-glue';

    public const AWS_LOG_RETENTION_DAYS = 'AWS_LOG_RETENTION_DAYS';
    public const AWS_LOG_RETENTION_DAYS_DEFAULT_VALUE = 30;

    public const AWS_SDK_PARAM_REGION = 'region';
    public const AWS_SDK_PARAM_VERSION = 'version';
    public const AWS_SDK_PARAM_CREDENTIALS = 'credentials';
    public const AWS_SDK_PARAM_KEY = 'key';
    public const AWS_SDK_PARAM_SECRET = 'secret';
    //------------
}
