<?php

namespace FondOfSpryker\Glue\Log\Plugin\Handler;

use FondOfSpryker\Shared\Log\SlackHandlerPluginTrait;
use Spryker\Glue\Kernel\AbstractPlugin;
use Spryker\Shared\Log\Dependency\Plugin\LogHandlerPluginInterface;

class SlackHandlerPlugin extends AbstractPlugin implements LogHandlerPluginInterface
{
    use SlackHandlerPluginTrait;
}
