<?php

namespace Tests\Models;

use App\Models\States\StartTransitions;
use PHPUnit\Framework\TestCase;

class StartTransitionsTest extends TestCase
{
    public function testFullSentence(): void
    {
        $sentence = 'Php is bad choice';
        $st = new StartTransitions('Php');
        $st->setTail($sentence);

        $this->assertEquals(
            \App\Models\States\StartTransitions::SUBJECT_STATE,
            $st->getState()
        );

        $this->assertEquals(
            'is bad choice',
            $st->getTail()
        );
    }
    
    public function testErrorState(): void
    {
        $sentence = 'Perl is bad choice';
        $st = new StartTransitions();
        $st->setTail($sentence);

        $this->assertEquals(
            StartTransitions::ERROR_STATE,
            $st->getState()
        );

        $this->assertEquals(
            'is bad choice',
            $st->getTail()
        );
    }
}