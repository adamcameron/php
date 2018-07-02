<?php

namespace me\adamcameron\general\test\validation\collectionIssue;

use me\adamcameron\general\validation\collectionIssue\IntegerValidator;
use PHPUnit\Framework\TestCase;

class IntegerValidatorTest extends TestCase
{
    use ViolationAssertions;

    private $validator;

    protected function setUp()
    {
        $this->validator = new IntegerValidator();
    }

    /** @dataProvider provideCasesForValidateTests */
    public function testValidate($validValue)
    {
        $violations = $this->validator->validate($validValue);
        $this->assertHasNoViolations($violations);
    }

    public function provideCasesForValidateTests()
    {
        return [
            'has value' => ['value' => 42],
            'is null' => ['value' => null]
        ];
    }

    /** @dataProvider provideCasesForViolationsTests */
    public function testValidateReturnsViolationsWhenConstraintsBroken($invalidValue)
    {
        $violations = $this->validator->validate($invalidValue);
        $this->assertHasViolations($violations);
    }

    public function provideCasesForViolationsTests()
    {
        return [
            'string' => ['value' => 'forty-two'],
            'integer string' => ['value' => '42'],
            'float' => ['value' => 4.2],
            'integer as float' => ['value' => 42.0],
            'array' => ['value' => [42]]
        ];
    }
}
