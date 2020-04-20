<?php

namespace FondOfSpryker\Shared\Log\Processor;

use Spryker\Shared\Log\Processor\ServerProcessor as SprykerServerProcessor;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ServerProcessor
 *
 * @package FondOfSpryker\Shared\Log
 */
class ServerProcessor extends SprykerServerProcessor
{
    public const X_FORWARDED_FOR = 'x_forwarded_for';

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        $serverData = parent::getData();

        $request = Request::createFromGlobals();

        $serverData[static::X_FORWARDED_FOR] = $request->server->get('HTTP_X_FORWARDED_FOR', null);

        return $serverData;
    }
}
