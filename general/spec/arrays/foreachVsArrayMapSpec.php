<?php

namespace me\adamcameron\general\spec\arrays;

use me\adamcameron\general\arrays\ForeachVsArrayMap;

describe('comparing testing for foreach vs array_map', function() {
    given('sut', function () {
        return new ForeachVsArrayMap();
    });
    given('allObjects', function () {
        return [
            (object) ['id' => 1, 'mi' => 'tahi'],
            (object) ['id' => 2, 'mi' => 'rua'],
            (object) ['id' => 3, 'mi' => 'toru'],
        ];
    });
    describe('tests of foreach', function() {
        it('returns the numbers as objects', function () {
            $result = $this->sut->getObjectsUsingForeach();
            expect($result)->toEqual($this->allObjects);
        });

        it('handles one result', function () {
            $result = $this->sut->getObjectsUsingForeach(1);
            $expected = [$this->allObjects[0]];

            expect($result)->toEqual($expected);
        });

        it('handles zero results', function () {
            $result = $this->sut->getObjectsUsingForeach(0);
            $expected = [];

            expect($result)->toEqual($expected);
        });
    });
/*    describe('tests of array_map', function() {
        it('returns the numbers as objects', function () {
            $result = $this->sut->getObjectsUsingArrayMap();
            expect($result)->toEqual($this->allObjects);
        });

        it('handles one result', function () {
            $result = $this->sut->getObjectsUsingArrayMap(1);
            $expected = [$this->allObjects[0]];

            expect($result)->toEqual($expected);
        });

        it('handles zero results', function () {
            $result = $this->sut->getObjectsUsingArrayMap(0);
            $expected = [];

            expect($result)->toEqual($expected);
        });
    });*/
});
