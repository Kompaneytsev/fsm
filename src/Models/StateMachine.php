<?php

namespace App\Models;

use App\Models\States\AbstractHandler;
use DomainException;

class StateMachine
{
    /**
     * @var AbstractHandler[]
     */
    private $handlers;

    /**
     * @var AbstractHandler
     */
    private $handler;

    /**
     * @var null|string
     */
    private $startState;

    /**
     * @var array
     */
    private $endStates;

    function __construct()
    {
        $this->handlers = [];
        $this->handler = null;
        $this->startState = null;
        $this->endStates = [];
    }

    /**
     * @param string $name
     * @param AbstractHandler|null $handler
     * @param bool $endState
     */
    function addState(string $name, AbstractHandler $handler = null, $endState = false): void
    {
        $this->handlers[$name] = $handler;
        if ($endState)
            $this->endStates[] = $name;
    }

    function setStart(string $name)
    {
        $this->startState = $name;
    }

    /**
     * @param string $text
     * @return string
     */
    function run(string $text)
    {
        if (!isset($this->handlers[$this->startState]))
            throw new DomainException('Set start handler before run');

        if (empty($this->endStates))
            throw new DomainException('At least one state must be at end state');

        $this->handler = $this->handlers[$this->startState];
        $this->handler->setTail($text);

        while (True) {
            $newState = $this->handler->getState();
            $text = $this->handler->getTail();
            if (in_array($newState, $this->endStates)) {
                return $newState;
            } else {
                $this->handler = $this->handlers[$newState];
                $this->handler->setTail($text);
            }
        }
        return AbstractHandler::ERROR_STATE;
    }
}