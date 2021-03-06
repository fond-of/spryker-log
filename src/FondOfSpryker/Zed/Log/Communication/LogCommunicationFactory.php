<?php

namespace FondOfSpryker\Zed\Log\Communication;

use FondOfSpryker\Shared\Log\Processor\ServerProcessor;
use Gelf\Publisher;
use Gelf\PublisherInterface;
use Gelf\Transport\AbstractTransport;
use Gelf\Transport\UdpTransport;
use Monolog\Formatter\GelfMessageFormatter;
use Monolog\Handler\GelfHandler;
use Monolog\Handler\SlackHandler;
use Spryker\Zed\Log\Communication\LogCommunicationFactory as BaseLogCommunicationFactory;

/**
 * @method \FondOfSpryker\Zed\Log\LogConfig getConfig()
 */
class LogCommunicationFactory extends BaseLogCommunicationFactory
{
    /**
     * @throws
     *
     * @return \Monolog\Handler\HandlerInterface|\Monolog\Handler\SlackHandler
     */
    public function createSlackHandler(): SlackHandler
    {
        $slackHandler = new SlackHandler(
            $this->getConfig()->getSlackToken(),
            $this->getConfig()->getSlackChannel(),
            $this->getConfig()->getSlackUsername(),
            true,
            null,
            $this->getConfig()->getLogLevel()
        );

        return $slackHandler;
    }

    /**
     * @return \Monolog\Handler\HandlerInterface|\Monolog\Handler\GelfHandler
     */
    public function createGelfHandler(): GelfHandler
    {
        $streamHandler = new GelfHandler(
            $this->createPublisher(),
            $this->getConfig()->getLogLevel()
        );

        $streamHandler->setFormatter($this->createGelfMessageFormatter());

        return $streamHandler;
    }

    /**
     * @return \Monolog\Formatter\FormatterInterface|\Monolog\Formatter\GelfMessageFormatter
     */
    protected function createGelfMessageFormatter()
    {
        return new GelfMessageFormatter(APPLICATION);
    }

    /**
     * @return \Gelf\PublisherInterface
     */
    protected function createPublisher(): PublisherInterface
    {
        return new Publisher($this->createUdpTransport());
    }

    /**
     * Deprecated: Will be renamed to createServerProcessorPublic() in the next major release
     *
     * @return \Spryker\Shared\Log\Processor\ProcessorInterface
     */
    public function createServerProcessorPublic()
    {
        return new ServerProcessor();
    }

    /**
     * @return \Gelf\Transport\AbstractTransport
     */
    protected function createUdpTransport(): AbstractTransport
    {
        $host = $this->getConfig()->getLogstashHost();
        $port = $this->getConfig()->getLogstashPort();

        return new UdpTransport($host, $port);
    }
}
