<?php

namespace App\Models\States;

class StartTransitions extends AbstractHandler
{
    private $subject;

    public function __construct($subject = null)
    {
        $this->subject = $subject;
    }

    public function run(): void
    {
        if ($this->currentWord === $this->subject) {
            $this->newState = parent::SUBJECT_STATE;
        } else {
            $this->newState = parent::ERROR_STATE;
        }
    }
}