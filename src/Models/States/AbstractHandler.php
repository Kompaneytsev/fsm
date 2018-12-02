<?php

namespace App\Models\States;

abstract class AbstractHandler
{
    const START_STATE = 'start';
    const ERROR_STATE = 'error_state';
    const SUBJECT_STATE = 'subject_state';
    const IS_STATE = 'is_state';
    const NOT_STATE = 'not_state';
    const POSITIVE_STATE = 'pos_state';
    const NEGATIVE_STATE = 'neg_state';

    /** @var string */
    protected $currentWord;

    /** @var string */
    protected $tail;
    
    /** @var string */
    protected $newState;

    abstract function run(): void;

    function getState(): string 
    {
        return $this->newState;
    }

    function getTail(): string 
    {
        return $this->tail;
    }

    function setTail(string $text): void
    {
        [$this->currentWord, $this->tail] = extractFirstWord($text);
        $this->run();
    }
}