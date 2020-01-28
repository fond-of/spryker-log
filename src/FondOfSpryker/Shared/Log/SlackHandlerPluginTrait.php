<?php

namespace FondOfSpryker\Shared\Log;

use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\HandlerInterface;

trait SlackHandlerPluginTrait
{
    /**
     * @var \Monolog\Handler\HandlerInterface
     */
    protected $handler;

    /**
     * @return \Monolog\Handler\HandlerInterface
     */
    protected function getHandler(): HandlerInterface
    {
        if (!$this->handler) {
            $this->handler = $this->getFactory()->createSlackHandler();
        }
        return $this->handler;
    }

    /**
     * @param array $record
     *
     * @return bool
     */
    public function isHandling(array $record)
    {
        return $this->getHandler()->isHandling($record);
    }

    /**
     * @param array $record
     *
     * @return bool
     */
    public function handle(array $record)
    {
        return $this->getHandler()->handle($record);
    }

    /**
     * @param array $records
     *
     * @return void
     */
    public function handleBatch(array $records)
    {
        $this->getHandler()->handleBatch($records);
    }

    /**
     * @param callable $callback
     *
     * @return \Monolog\Handler\HandlerInterface
     */
    public function pushProcessor($callback)
    {
        return $this->getHandler()->pushProcessor($callback);
    }

    /**
     * @return callable
     */
    public function popProcessor()
    {
        return $this->getHandler()->popProcessor();
    }

    /**
     * @param \Monolog\Formatter\FormatterInterface $formatter
     *
     * @return \Monolog\Handler\HandlerInterface
     */
    public function setFormatter(FormatterInterface $formatter)
    {
        return $this->getHandler()->setFormatter($formatter);
    }

    /**
     * @return \Monolog\Formatter\FormatterInterface
     */
    public function getFormatter()
    {
        return $this->getHandler()->getFormatter();
    }
}
