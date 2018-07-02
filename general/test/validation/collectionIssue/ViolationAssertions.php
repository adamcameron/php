<?php

namespace me\adamcameron\general\test\validation\collectionIssue;

use Symfony\Component\Validator\ConstraintViolationList;

trait ViolationAssertions
{
    public function assertHasNoViolations($violations)
    {
        $this->assertInstanceOf(ConstraintViolationList::class, $violations);
        $this->assertEmpty($violations);
    }

    public function assertHasViolations($violations)
    {
        $this->assertInstanceOf(ConstraintViolationList::class, $violations);
        $this->assertNotEmpty($violations);
    }
}
