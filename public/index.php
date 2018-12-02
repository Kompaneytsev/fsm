<?php

require_once __DIR__ . '/../src/functions/extractFirstWord.php';

require __DIR__ . '/../vendor/autoload.php';

use App\Models\StateMachine;
use App\Models\States\{
    AbstractHandler, IsStateTransitions, NotStateTransitions, StartTransitions, SubjectStateTransitions
};

$sm = new StateMachine();

$positive_adjectives = ['great', 'super', 'fun', 'entertaining', 'easy'];
$negative_adjectives = ['boring', 'difficult', 'ugly', 'bad'];

$sm->addState(AbstractHandler::START_STATE, new StartTransitions('PHP'));
$sm->addState(AbstractHandler::SUBJECT_STATE, new SubjectStateTransitions());
$sm->addState(AbstractHandler::IS_STATE, new IsStateTransitions($positive_adjectives, $negative_adjectives));
$sm->addState(AbstractHandler::NOT_STATE, new NotStateTransitions($positive_adjectives, $negative_adjectives));

$sm->addState(AbstractHandler::NEGATIVE_STATE, null, 1);
$sm->addState(AbstractHandler::POSITIVE_STATE, null, 1);
$sm->addState(AbstractHandler::ERROR_STATE, null, 1);

$sm->setStart(AbstractHandler::START_STATE);

//echo $sm->run('PHP is great');
echo $sm->run('PHP is not bad');