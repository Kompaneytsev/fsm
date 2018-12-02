# A simple example of Finite State Machine (FSM) on PHP

We want to recognize the meaning of very small sentences with an extremely limited vocabulary and syntax:
These sentences should start with "PHP is" followed by

* an adjective or
* the word "not" followed by an adjective.

e.g.
```
"PHP is great" → positive meaning
"PHP is stupid" → negative meaning
"PHP is not ugly" → positive meaning
```

## Lurk more
* [Original article with example on Python](https://www.python-course.eu/finite_state_machine.php)
* [Wiki](https://en.wikipedia.org/wiki/Finite-state_machine)

## Tests
```bash
vendor/bin/phpunit
```