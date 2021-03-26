<?php

namespace FondOfSpryker\Yves\Log\Plugin\Handler;

use FondOfSpryker\Shared\Log\AwsCloudWatchHandlerPluginTrait;
use Spryker\Shared\Log\Dependency\Plugin\LogHandlerPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\Log\LogFactory getFactory()
 */
class AwsCloudWatchHandlerPlugin extends AbstractPlugin implements LogHandlerPluginInterface
{
    use AwsCloudWatchHandlerPluginTrait;
}
