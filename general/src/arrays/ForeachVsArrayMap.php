<?php

namespace me\adamcameron\general\arrays;

class ForeachVsArrayMap
{
    private $allData;

    public function __construct()
    {
        $this->allData = [
            ['id' => 1, 'mi' => 'tahi'],
            ['id' => 2, 'mi' => 'rua'],
            ['id' => 3, 'mi' => 'toru']
        ];
    }w

    private function getNumbers($rows)
    {
        return array_slice($this->allData, 0, $rows);
    }

public function getObjectsUsingForeach($rows = 3)
{
    $data = $this->getNumbers($rows);
    $numbers = [];
    foreach ($data as $row) {
        $numbers[] = (object) $row;
    }

    return $numbers;
}

    public function getObjectsUsingArrayMap($rows = 3)
    {
        return array_map(function ($row) {
            return (object) $row;
        }, $this->getNumbers($rows));
    }
}
