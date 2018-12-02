<?php

namespace App\Models\States;

class NegativeState extends AbstractHandler
{
    public function run(): void
    {
        $this->newState = parent::NEGATIVE_STATE;
        $this->tail = '';
    }
}