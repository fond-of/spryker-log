<?php

namespace FondOfSpryker\Yves\Log\Plugin\Handler;

use FondOfSpryker\Shared\Log\GelfHandlerPuginTrait;
use Spryker\Shared\Log\Dependency\Plugin\LogHandlerPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yved\Log\LogFactory getFactory()
 */
class GelfHandlerPlugin extends AbstractPlugin implements LogHandlerPluginInterface
{
    use GelfHandlerPuginTrait;
}
