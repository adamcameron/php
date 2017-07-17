<?php

namespace me\adamcameron\db\test\unit\repository;

use me\adamcameron\db\dao\PeopleDAO;
use me\adamcameron\db\model\Name;
use me\adamcameron\db\repository\PeopleRepository;
use PHPUnit\Framework\TestCase;

class PeopleRepositoryTest extends TestCase
{
    /** @var PeopleDAO|\PHPUnit_Framework_MockObject_MockObject */
    private $dao;

    /** @var PeopleRepository */
    private $repo;

    public function setup()
    {
        $this->setDao();
        $this->repo = new PeopleRepository($this->dao);
    }

    public function testGetNameByFirstChar()
    {
        $data = [
            'Ava' => ['id' => 5, 'rank' => 3, 'gender' => 'F'],
            'Amelia' => ['id' => 9, 'rank' => 5, 'gender' => 'F'],
            'Adam' => ['id' => 11, 'rank' => 6, 'gender' => 'M'],
            'Alex' => ['id' => 25, 'rank' => 13, 'gender' => 'M']
        ];

        $this->dao
            ->method('getNameByFirstChar')
            ->willReturn($data);

        $testLetter = 'a';
        $names = $this->repo->getNameByFirstChar($testLetter);

        $this->assertCount(count($data), $names);

        reset($data);

        /** @var $name Name */
        foreach ($names as $i =>  $name) {
            $this->assertInstanceOf(Name::class, $name);

            $this->assertSame(key($data), $name->firstName);
            $row = current($data);
            $this->assertSame($row['id'], $name->id);
            $this->assertSame($row['rank'], $name->rank);
            $this->assertSame($row['gender'], $name->gender);
            next($data);
        }
    }

    private function setDao() : void
    {
        $this->dao = $this
            ->getMockBuilder(PeopleDAO::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}
