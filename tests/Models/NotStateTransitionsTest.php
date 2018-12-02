<?php

namespace Tests\Models;

use App\Models\States\NotStateTransitions;
use PHPUnit\Framework\TestCase;

class NotStateTransitionsTest extends TestCase
{
    public function testNegativeState(): void
    {
        $sentence = 'bad choice';
        $positive_adjectives = ['great', 'super', 'fun', 'entertaining', 'easy'];
        $negative_adjectives = ['boring', 'difficult', 'ugly', 'bad'];
        $st = new NotStateTransitions($positive_adjectives, $negative_adjectives);
        $st->setTail($sentence);

        $this->assertEquals(
            NotStateTransitions::POSITIVE_STATE,
            $st->getState()
        );

        $this->assertEquals(
            'choice',
            $st->getTail()
        );
    }

    public function testPositiveState(): void
    {
        $sentence = 'fun choice';
        $positive_adjectives = ['great', 'super', 'fun', 'entertaining', 'easy'];
        $negative_adjectives = ['boring', 'difficult', 'ugly', 'bad'];
        $st = new NotStateTransitions($positive_adjectives, $negative_adjectives);
        $st->setTail($sentence);

        $this->assertEquals(
            NotStateTransitions::NEGATIVE_STATE,
            $st->getState()
        );

        $this->assertEquals(
            'choice',
            $st->getTail()
        );
    }

    public function testErrorState(): void
    {
        $sentence = 'gavno choice';
        $positive_adjectives = ['great', 'super', 'fun', 'entertaining', 'easy'];
        $negative_adjectives = ['boring', 'difficult', 'ugly', 'bad'];
        $st = new NotStateTransitions($positive_adjectives, $negative_adjectives);
        $st->setTail($sentence);

        $this->assertEquals(
            NotStateTransitions::ERROR_STATE,
            $st->getState()
        );

        $this->assertEquals(
            'choice',
            $st->getTail()
        );
    }
}