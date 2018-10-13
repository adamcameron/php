<?php

namespace me\adamcameron\general\validation\collectionIssue;

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Optional;
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
            new Type([
                'type' => 'iterable',
                'groups' => ['collection_check'],
            ]),
            new Collection([
                'fields' => [
                    'field1' => [
                        new Type([
                            'type'=>'integer',
                            'groups' => ['fields_check'],
                        ]),
                    ],
                ],
                'allowMissingFields' => true,
                'allowExtraFields' => true,
                'groups' => ['fields_check'],
            ])
        ];
    }

    public function validate($value = null)
    {
        $result = $this->validator->validate($value, $this->constraints, ['collection_check']);
        if (count($result)) {
            return $result;
        }
        return $this->validator->validate($value, $this->constraints, ['fields_check']);
    }
}
