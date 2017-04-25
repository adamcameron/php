<?php

namespace me\adamcameron\cleancode\test\service;

use me\adamcameron\cleancode\repository\AvailabilityRepository;
use me\adamcameron\cleancode\repository\MediaRepository;
use me\adamcameron\cleancode\repository\MetadataRepository;
use me\adamcameron\cleancode\repository\PersonnelRepository;
use me\adamcameron\cleancode\repository\PropertyRepository;
use me\adamcameron\cleancode\repository\SocialRepository;
use me\adamcameron\cleancode\service\PropertyService;
use PHPUnit\Framework\TestCase;

/** @coversDefaultClass me\adamcameron\cleancode\service\PropertyService */
class PropertyServiceTest extends TestCase
{
    private $propertyRepository;
    private $mediaRepository;
    private $metadataRepository;
    private $socialRepository;
    private $personnelRepository;
    private $availabilityRepository;

    private $service;

    private static $testId = 2011;
    private static $mediaParameter = 'MEDIA_PARAMETER';
    private static $metadataParameter = 'METADATA_PARAMETER';
    private static $socialParameter = 'SOCIAL_PARAMETER';
    private static $personnelParameter = 'PERSONNEL_PARAMETER';
    private static $availabilityParameter = 'AVAILABILITY_PARAMETER';

    public function setup()
    {
        $this->setMockedDependencies();
        $this->service = new PropertyService(
            $this->propertyRepository,
            $this->mediaRepository,
            $this->metadataRepository,
            $this->socialRepository,
            $this->personnelRepository,
            $this->availabilityRepository
        );
    }

    /**
     * @covers ::update
     * @dataProvider provideCasesForUpdateTests
     */
    public function testUpdate($parameters)
    {
        $this->mockExpectationsForUpdateTests($parameters);

        $this->service->update(self::$testId, $parameters);
    }

    /**
     * @covers ::update2
     * @dataProvider provideCasesForUpdateTests
     */
    public function testUpdate2($parameters)
    {
        $this->mockExpectationsForUpdateTests($parameters);

        $this->service->update2(self::$testId, $parameters);
    }

    /**
     * @covers ::update3
     * @dataProvider provideCasesForUpdateTests
     */
    public function testUpdate3($parameters)
    {
        $this->mockExpectationsForUpdateTests($parameters);

        $this->service->update3(self::$testId, $parameters);
    }

    public function provideCasesForUpdateTests()
    {
        $allParameters = [
            'id' => self::$testId,
            'media' => [self::$mediaParameter],
            'metadata' => [self::$metadataParameter],
            'social' => [self::$socialParameter],
            'personnel' => [self::$personnelParameter],
            'availability' => [self::$availabilityParameter],
        ];

        return [
            'no optionals' => ['parameters' => []],
            'media is simple' => ['parameters' => ['media' => self::$mediaParameter]],
            'media is array' => ['parameters' => ['media' => [self::$mediaParameter]]],
            'metadata is simple' => ['parameters' => ['metadata' => self::$metadataParameter]],
            'metadata is array' => ['parameters' => ['metadata' => [self::$metadataParameter]]],
            'social is simple' => ['parameters' => ['social' => self::$socialParameter]],
            'social is array' => ['parameters' => ['social' => [self::$socialParameter]]],
            'personnel is simple' => ['parameters' => ['personnel' => self::$personnelParameter]],
            'personnel is array' => ['parameters' => ['personnel' => [self::$personnelParameter]]],
            'availability is simple' => ['parameters' => ['availability' => self::$availabilityParameter]],
            'availability is array' => ['parameters' => ['availability' => [self::$availabilityParameter]]],
            'all optionals' => ['parameters' => $allParameters]
        ];
    }

    private function setMockedDependencies()
    {
        $this->propertyRepository = $this
            ->getMockBuilder(PropertyRepository::class)
            ->getMock();
        $this->mediaRepository = $this
            ->getMockBuilder(MediaRepository::class)
            ->getMock();
        $this->metadataRepository = $this
            ->getMockBuilder(MetadataRepository::class)
            ->getMock();
        $this->socialRepository = $this
            ->getMockBuilder(SocialRepository::class)
            ->getMock();
        $this->personnelRepository = $this
            ->getMockBuilder(PersonnelRepository::class)
            ->getMock();
        $this->availabilityRepository = $this
            ->getMockBuilder(AvailabilityRepository::class)
            ->getMock();
    }

    private function mockExpectationsForUpdateTests($parameters)
    {
        $this->propertyRepository
            ->expects($this->once())
            ->method('update')
            ->with(self::$testId, $parameters);

        $optionals = ['media', 'metadata', 'social', 'personnel', 'availability'];
        foreach ($optionals as $optional) {
            $expectCall = array_key_exists($optional, $parameters)
                && is_array($parameters[$optional]);
            $repo = "${optional}Repository";
            $mockedMethod = $this->$repo
                ->expects($this->exactly($expectCall ? 1 : 0))
                ->method('update');
            if ($expectCall) {
                $mockedMethod->with(self::$testId, $parameters[$optional]);
            }
        }
    }
}
