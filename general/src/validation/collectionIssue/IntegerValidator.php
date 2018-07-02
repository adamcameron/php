<?php

namespace me\adamcameron\general\validation\collectionIssue;

use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Validation;

class IntegerValidator
{

    private $validator;
    private $constraints;

    public function __construct()
    {
        $this->validator = Validation::createValidator();
        $this->setConstraints();
    }

    private function setConstraints()
    {
        $this->constraints = [
            new Type(['type' => 'integer'])
        ];
    }

    public function validate($value)
    {
        return $this->validator->validate($value, $this->constraints);
    }
}
