<?php

namespace FondOfSpryker\Zed\Log\Communication\Plugin\Handler;

use FondOfSpryker\Shared\Log\GelfHandlerPluginTrait;
use Spryker\Shared\Log\Dependency\Plugin\LogHandlerPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\Log\Communication\LogCommunicationFactory getFactory()
 * @method \Spryker\Zed\Log\Business\LogFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\Log\LogConfig getConfig()
 */
class GelfHandlerPlugin extends AbstractPlugin implements LogHandlerPluginInterface
{
    use GelfHandlerPluginTrait;
}
