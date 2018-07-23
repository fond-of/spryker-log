<?php

namespace FondOfSpryker\Yves\Log;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\Log\LogConstants;
use org\bovigo\vfs\vfsStream;
use Spryker\Shared\Config\Config;

class LogConfigTest extends Unit
{
    /**
     * @var \FondOfSpryker\Yves\Log\LogConfig
     */
    protected $logConfig;

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

        $this->logConfig = new LogConfig();
    }

    /**
     * @return void
     */
    public function testGetDefaultLogstashHost()
    {
        $fileUrl = vfsStream::url('root/config/Shared/config_default.php');
        $newFileContent = file_get_contents(codecept_data_dir('empty_config_default.php'));
        file_put_contents($fileUrl, $newFileContent);

        Config::getInstance()->init();

        $this->assertEquals(LogConstants::LOGSTASH_HOST_VALUE, $this->logConfig->getLogstashHost());
    }

    /**
     * @return void
     */
    public function testGetDefaultLogstasPort()
    {
        $fileUrl = vfsStream::url('root/config/Shared/config_default.php');
        $newFileContent = file_get_contents(codecept_data_dir('empty_config_default.php'));
        file_put_contents($fileUrl, $newFileContent);

        Config::getInstance()->init();

        $this->assertEquals(LogConstants::LOGSTASH_PORT_VALUE, $this->logConfig->getLogstashPort());
    }

    /**
     * @return void
     */
    public function testGetCustomLogstashHost()
    {
        $fileUrl = vfsStream::url('root/config/Shared/config_default.php');
        $newFileContent = file_get_contents(codecept_data_dir('config_default.php'));
        file_put_contents($fileUrl, $newFileContent);

        Config::getInstance()->init();

        $this->assertEquals('logstash.custom', $this->logConfig->getLogstashHost());
    }

    /**
     * @return void
     */
    public function testGetCustomLogstashPort()
    {
        $fileUrl = vfsStream::url('root/config/Shared/config_default.php');
        $newFileContent = file_get_contents(codecept_data_dir('config_default.php'));
        file_put_contents($fileUrl, $newFileContent);

        Config::getInstance()->init();

        $this->assertEquals(12345, $this->logConfig->getLogstashPort());
    }
}
