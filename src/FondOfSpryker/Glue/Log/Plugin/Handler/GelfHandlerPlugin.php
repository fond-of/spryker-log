<?php

namespace FondOfSpryker\Glue\Log\Plugin\Handler;

use FondOfSpryker\Shared\Log\GelfHandlerPluginTrait;
use Spryker\Glue\Kernel\AbstractPlugin;
use Spryker\Shared\Log\Dependency\Plugin\LogHandlerPluginInterface;

class GelfHandlerPlugin extends AbstractPlugin implements LogHandlerPluginInterface
{
    use GelfHandlerPluginTrait;
}
