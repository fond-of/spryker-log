<?php

namespace FondOfSpryker\Shared\Log\Processor;

use Codeception\Test\Unit;

class ServerProcessorTest extends Unit
{
    /**
     * @var \FondOfSpryker\Shared\Log\Processor\ServerProcessor
     */
    protected $processor;

    /**
     * @return void
     */
    public function _before(): void
    {
        parent::_before();
        $this->processor = new ServerProcessor();
    }

    /**
     * @return void
     */
    public function testGetDataHasNotXforwarededFor(): void
    {
        $data = $this->processor->getData();

        $this->assertArrayHasKey(ServerProcessor::X_FORWARDED_FOR, $data);
        $this->assertNull($data[ServerProcessor::X_FORWARDED_FOR]);
    }

    /**
     * @return void
     */
    public function testGetDataHasXforwarededFor(): void
    {
        $testIp = '192.168.255.1';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = $testIp;

        $data = $this->processor->getData();
        $this->assertArrayHasKey(ServerProcessor::X_FORWARDED_FOR, $data);
        $this->assertSame($testIp, $data[ServerProcessor::X_FORWARDED_FOR]);
    }
}
