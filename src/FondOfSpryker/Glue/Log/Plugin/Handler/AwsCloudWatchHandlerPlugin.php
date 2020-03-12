<?php

namespace FondOfSpryker\Glue\Log\Plugin\Handler;

use FondOfSpryker\Shared\Log\AwsCloudWatchHandlerPluginTrait;
use Spryker\Glue\Kernel\AbstractPlugin;
use Spryker\Shared\Log\Dependency\Plugin\LogHandlerPluginInterface;

class AwsCloudWatchHandlerPlugin extends AbstractPlugin implements LogHandlerPluginInterface
{
    use AwsCloudWatchHandlerPluginTrait;
}
