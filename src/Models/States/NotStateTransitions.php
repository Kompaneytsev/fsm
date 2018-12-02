<?php

namespace App\Models\States;

class NotStateTransitions extends AbstractHandler
{
    protected $positive_adjectives;
    protected $negative_adjectives;
    
    public function __construct(array $positive_adjectives, array $negative_adjectives)
    {
        $this->positive_adjectives = $positive_adjectives;
        $this->negative_adjectives = $negative_adjectives;
    }
    
    public function run(): void
    {
        switch ($this->currentWord) {
            case in_array($this->currentWord, $this->positive_adjectives):
                $this->newState = parent::NEGATIVE_STATE;
                break;
            case in_array($this->currentWord, $this->negative_adjectives):
                $this->newState = parent::POSITIVE_STATE;
                break;
            default:
                $this->newState = parent::ERROR_STATE;
                break;
        }
    }
}