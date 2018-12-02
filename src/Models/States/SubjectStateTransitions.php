<?php

namespace App\Models\States;

class SubjectStateTransitions extends AbstractHandler
{
    public function run(): void
    {
        if ($this->currentWord === 'is') {
            $this->newState = parent::IS_STATE;
        } else {
            $this->newState = parent::ERROR_STATE;
        }
    }
}