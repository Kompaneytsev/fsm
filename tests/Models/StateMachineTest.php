<?php

namespace Tests\Models;

use App\Models\StateMachine;
use App\Models\States\{
    AbstractHandler, IsStateTransitions, NotStateTransitions, StartTransitions, SubjectStateTransitions
};
use PHPUnit\Framework\TestCase;

class StateMachineTest extends TestCase
{
    public function testSimpleExecution()
    {
        $sm = new StateMachine();
        $positive_adjectives = ['great', 'super', 'fun', 'entertaining', 'easy'];
        $negative_adjectives = ['boring', 'difficult', 'ugly', 'bad'];

        $sm->addState(AbstractHandler::START_STATE, new StartTransitions('Php'));
        $sm->addState(AbstractHandler::SUBJECT_STATE, new SubjectStateTransitions());
        $sm->addState(AbstractHandler::IS_STATE, new IsStateTransitions($positive_adjectives, $negative_adjectives));
        $sm->addState(AbstractHandler::NOT_STATE, new NotStateTransitions($positive_adjectives, $negative_adjectives));

        $sm->addState(AbstractHandler::NEGATIVE_STATE, null, true);
        $sm->addState(AbstractHandler::POSITIVE_STATE, null, true);
        $sm->addState(AbstractHandler::ERROR_STATE, null, true);

        $sm->setStart(AbstractHandler::START_STATE);

        $this->assertEquals(
            AbstractHandler::POSITIVE_STATE,
            $sm->run('Php is great')
        );

        $this->assertEquals(
            AbstractHandler::POSITIVE_STATE,
            $sm->run('Php is not bad')
        );

        $this->assertEquals(
            AbstractHandler::NEGATIVE_STATE,
            $sm->run('Php is bad')
        );

        $this->assertEquals(
            AbstractHandler::ERROR_STATE,
            $sm->run('Python is great')
        );
    }
}