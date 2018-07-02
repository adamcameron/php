<?php

namespace me\adamcameron\general\test\validation\collectionIssue;

use me\adamcameron\general\validation\collectionIssue\CollectionValidator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class CollectionValidatorTest extends TestCase
{
    use ViolationAssertions;

    private $validator;

    protected function setUp()
    {
        $this->validator = new CollectionValidator();
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
            'empty' => ['value' => []],
            'has value' => ['value' => ['array']],
            'iterator' => ['value' => new \ArrayIterator(['array'])]
        ];
    }

    public function testValidateNotIntegerShouldResultInAViolation()
    {
        $violations = $this->validator->validate(['field1'=>'NOT_AN_INTEGER']);
        $this->assertHasViolations($violations);
    }

    public function testValidateWithNullIsApparentlyOK()
    {
        $violations = $this->validator->validate(null);
        $this->assertHasNoViolations($violations);
    }

    /** @throws UnexpectedTypeException */
    public function testValidateWithNonTraversableShouldCauseViolation()
    {
        $violations = $this->validator->validate('string');
        $this->assertHasViolations($violations);
    }
}
