<?php

namespace Tests\Models;

use App\Models\States\SubjectStateTransitions;
use PHPUnit\Framework\TestCase;

class SubjectStateTransitionsTest extends TestCase
{
    public function testFullSentence(): void
    {
        $sentence = 'is bad choice';
        $st = new SubjectStateTransitions();
        $st->setTail($sentence);

        $this->assertEquals(
            SubjectStateTransitions::IS_STATE,
            $st->getState()
        );

        $this->assertEquals(
            'bad choice',
            $st->getTail()
        );
    }
    
    public function testErrorState(): void
    {
        $sentence = 'not bad choice';
        $st = new SubjectStateTransitions();
        $st->setTail($sentence);

        $this->assertEquals(
            SubjectStateTransitions::ERROR_STATE,
            $st->getState()
        );

        $this->assertEquals(
            'bad choice',
            $st->getTail()
        );
    }
}