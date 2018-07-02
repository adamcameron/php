<?php

namespace me\adamcameron\general\test\validation\collectionIssue;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class StringValidatorTest extends TestCase
{
    public function testExampleFromDocumentation()
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate(
            'Bernhard',
            [
                new Length(['min' => 10]),
                new NotBlank(),
            ]
        );

        $this->assertCount(1, $violations);
        $this->assertEquals(
            'This value is too short. It should have 10 characters or more.',
            $violations[0]->getMessage()
        );
    }
}
