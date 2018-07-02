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

    /** @dataProvider provideCasesForValidateEmptyCollectionTests */
    public function testValidateWithValidButEmptyCollectionTypeIsOk($validValue)
    {
        $violations = $this->validator->validate($validValue);
        $this->assertHasNoViolations($violations);
    }

    public function provideCasesForValidateEmptyCollectionTests()
    {
        return [
            'array' => ['value' => []],
            'iterator' => ['value' => new \ArrayIterator()]
        ];
    }

    public function testValidateWithIntegerField1ValueShouldPass()
    {
        $violations = $this->validator->validate(['field1'=>42]);
        $this->assertHasNoViolations($violations);
    }

    public function testValidateWithNonIntegerField1ValueShouldHaveViolation()
    {
        $violations = $this->validator->validate(['field1'=>'NOT_AN_INTEGER']);
        $this->assertHasViolations($violations);
        $this->assertSame('This value should be of type integer.', $violations[0]->getMessage());
    }

    public function testValidateWithOnlyOtherFieldsShouldPass()
    {
        $violations = $this->validator->validate(['anotherField'=>'another value']);
        $this->assertHasNoViolations($violations);
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
