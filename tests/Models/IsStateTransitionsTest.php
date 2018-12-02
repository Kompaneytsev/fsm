<?php

namespace Tests\Models;

use App\Models\States\IsStateTransitions;
use PHPUnit\Framework\TestCase;

class IsStateTransitionsTest extends TestCase
{
    public function testNegativeState(): void
    {
        $sentence = 'bad choice';
        $positive_adjectives = ['great', 'super', 'fun', 'entertaining', 'easy'];
        $negative_adjectives = ['boring', 'difficult', 'ugly', 'bad'];
        $st = new IsStateTransitions($positive_adjectives, $negative_adjectives);
        $st->setTail($sentence);

        $this->assertEquals(
            IsStateTransitions::NEGATIVE_STATE,
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
        $st = new IsStateTransitions($positive_adjectives, $negative_adjectives);
        $st->setTail($sentence);

        $this->assertEquals(
            IsStateTransitions::POSITIVE_STATE,
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
        $st = new IsStateTransitions($positive_adjectives, $negative_adjectives);
        $st->setTail($sentence);

        $this->assertEquals(
            IsStateTransitions::ERROR_STATE,
            $st->getState()
        );

        $this->assertEquals(
            'choice',
            $st->getTail()
        );
    }

    public function testNotState(): void
    {
        $sentence = 'not choice';
        $positive_adjectives = ['great', 'super', 'fun', 'entertaining', 'easy'];
        $negative_adjectives = ['boring', 'difficult', 'ugly', 'bad'];
        $st = new IsStateTransitions($positive_adjectives, $negative_adjectives);
        $st->setTail($sentence);

        $this->assertEquals(
            IsStateTransitions::NOT_STATE,
            $st->getState()
        );

        $this->assertEquals(
            'choice',
            $st->getTail()
        );
    }
}