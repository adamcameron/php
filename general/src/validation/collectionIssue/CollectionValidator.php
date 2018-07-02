<?php

namespace me\adamcameron\general\validation\collectionIssue;

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Validation;

class CollectionValidator
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
            new Collection([
                'fields' => [
                    'field1' => [new Type(['type'=>'integer'])]
                ],
                'allowMissingFields' => true,
                'allowExtraFields' => true
            ])
        ];
    }

    public function validate($value = null)
    {
        return $this->validator->validate($value, $this->constraints);
    }
}
