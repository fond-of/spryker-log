<?php

namespace FondOfSpryker\Yves\Log\Plugin\Handler;

use FondOfSpryker\Shared\Log\SlackHandlerPluginTrait;
use Spryker\Shared\Log\Dependency\Plugin\LogHandlerPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\Log\LogFactory getFactory()
 */
class SlackHandlerPlugin extends AbstractPlugin implements LogHandlerPluginInterface
{
    use SlackHandlerPluginTrait;
}
