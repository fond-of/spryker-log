<?php

namespace FondOfSpryker\Zed\Log\Communication;

use Codeception\Test\Unit;
use Monolog\Handler\GelfHandler;
use org\bovigo\vfs\vfsStream;
use Spryker\Shared\Config\Config;

class LogCommunicationFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\Log\Communication\LogCommunicationFactory
     */
    protected $logCommunicationFactory;

    /**
     * @return void
     */
    protected function _before()
    {
        $this->vfsStreamDirectory = vfsStream::setup('root', null, [
            'config' => [
                'Shared' => [
                    'stores.php' => file_get_contents(codecept_data_dir('stores.php')),
                    'config_default.php' => file_get_contents(codecept_data_dir('empty_config_default.php')),
                ],
            ],
        ]);

        $this->logCommunicationFactory = new LogCommunicationFactory();
    }

    /**
     * @return void
     */
    public function testCreateGelfHandler()
    {
        Config::getInstance()->init();

        $gelfHandler = $this->logCommunicationFactory->createGelfHandler();

        $this->assertInstanceOf(GelfHandler::class, $gelfHandler);
    }
}
