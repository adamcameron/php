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

    private $simple = 'DEFAULT';

    private $service;

    private static $testId = 2011;
    private static $mediaParameter = 'MEDIA_PARAMETER';
    private static $metadataParameter = 'METADATA_PARAMETER';
    private static $socialParameter = 'SOCIAL_PARAMETER';
    private static $personnelParameter = 'PERSONNEL_PARAMETER';
    private static $availabilityParameter = 'AVAILABILITY_PARAMETER';

    private static $repositories = [
        'media',
        'metadata',
        'social',
        'personnel',
        'availability'
    ];

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        error_log("IN CONSTRUCTOR: [" . $this->simple . ']' . PHP_EOL, 3, 'C:\temp\err.log');
        parent::__construct($name, $data, $dataName);
    }

    public function setupTests()
    {
        $this->simple = "SETUP";
        error_log("IN DP: [" . $this->simple . ']' . PHP_EOL, 3, 'C:\temp\err.log');
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
    public function _testUpdate($parameters)
    {
        $this->setupTests();
        $this->mockExpectationsForUpdateTests($parameters);

        $this->service->update(self::$testId, $parameters);
    }

    /**
     * @covers ::update2
     * @covers ::keyExistsAndIsArray
     * @dataProvider provideCasesForUpdateTests
     */
    public function _testUpdate2($parameters)
    {
        $this->setupTests();
        $this->mockExpectationsForUpdateTests($parameters);

        $this->service->update2(self::$testId, $parameters);
    }

    /**
     * @covers ::update3
     * @covers ::updateOptional
     * @dataProvider provideCasesForUpdateTests
     */
    public function _testUpdate3($parameters)
    {
        $this->setupTests();
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
            'availability is array' => ['parameters' => ['personnel' => [self::$availabilityParameter]]],
            'all optionals' => ['parameters' => $allParameters]
        ];
    }

    /**
     * @covers ::update3
     * @covers ::updateOptional
     * @dataProvider provideCasesForImprovedUpdateTests
     */
    public function testUpdateImproved($parameters, $repoCalls)
    {
        error_log("IN TEST: [" . $this->simple . ']' . PHP_EOL, 3, 'C:\temp\err.log');
        $this->mockExpectationsForImprovedUpdateTests($parameters, $repoCalls);

        $this->service->update3(self::$testId, $parameters);
    }

    public function provideCasesForImprovedUpdateTests()
    {
        $this->setupTests();

        echo "IN DP: [" . $this->simple . ']' . PHP_EOL;
        echo 'OBJECT: [' . spl_object_hash($this) . ']' . PHP_EOL;
        $allParameters = [
            'id' => self::$testId,
            'media' => [self::$mediaParameter],
            'metadata' => [self::$metadataParameter],
            'social' => [self::$socialParameter],
            'personnel' => [self::$personnelParameter],
            'availability' => [self::$availabilityParameter],
        ];

        $noRepoCalls = [
            'media' => ['repo'=>$this->mediaRepository, 'calls' => 0],
            'metadata' => ['repo'=>$this->metadataRepository, 'calls' => 0],
            'social' => ['repo'=>$this->socialRepository, 'calls' => 0],
            'personnel' => ['repo'=>$this->personnelRepository, 'calls' => 0],
            'availability' => ['repo'=>$this->availabilityRepository, 'calls' => 0]
        ];
        $mediaRepoCall = $noRepoCalls;
        $mediaRepoCall['media']['calls'] = 1;
        $metadataRepoCall = $noRepoCalls;
        $metadataRepoCall['metadata']['calls'] = 1;
        $socialRepoCall = $noRepoCalls;
        $socialRepoCall['social']['calls'] = 1;
        $personnelRepoCall = $noRepoCalls;
        $personnelRepoCall['personnel']['calls'] = 1;
        $availabilityRepoCall = $noRepoCalls;
        $availabilityRepoCall['availability']['calls'] = 1;

        $allRepoCalls = array_map(function($call){
            $call['calls'] = 1;
            return $call;
        }, $noRepoCalls);

        return [
            'no optionals' => ['parameters' => [], 'repoCalls' => []],
            'media is simple' => ['parameters' => ['media' => self::$mediaParameter], 'repoCalls' => $noRepoCalls],
            /*'media is array' => ['parameters' => ['media' => [self::$mediaParameter]], 'repoCalls' => $mediaRepoCall],
            'metadata is simple' => ['parameters' => ['metadata' => self::$metadataParameter], 'repoCalls' => []],
            'metadata is array' => ['parameters' => ['metadata' => [self::$metadataParameter]], 'repoCalls' => $metadataRepoCall],
            'social is simple' => ['parameters' => ['social' => self::$socialParameter], 'repoCalls' => []],
            'social is array' => ['parameters' => ['social' => [self::$socialParameter]], 'repoCalls' => $socialRepoCall],
            'personnel is simple' => ['parameters' => ['personnel' => self::$personnelParameter], 'repoCalls' => []],
            'personnel is array' => ['parameters' => ['personnel' => [self::$personnelParameter]], 'repoCalls' => $personnelRepoCall],
            'availability is simple' => ['parameters' => ['availability' => self::$availabilityParameter], 'repoCalls' => []],
            'availability is array' => ['parameters' => ['availability' => [self::$availabilityParameter]], 'repoCalls' => $availabilityRepoCall],
            'all optionals' => ['parameters' => $allParameters, 'repoCalls' => $allRepoCalls]
 */       ];
    }

    private function setMockedDependencies()
    {
        $this->propertyRepository = $this
            ->getMockBuilder(PropertyRepository::class)
            ->getMock();

        echo "but was set here";

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

    private function mockExpectationsForImprovedUpdateTests($parameters, $repoCalls)
    {

        $this->propertyRepository
            ->expects($this->once())
            ->method('update')
            ->with(self::$testId, $parameters);

        foreach ($repoCalls as $parameter => $repoCall) {
            $mockedMethod = $repoCall['repo']
                ->expects($this->exactly($repoCall['calls']))
                ->method('update');
            if ($repoCall['calls'] == 1) {
                $mockedMethod->with(self::$testId, $parameters[$parameter]);
            }
        }
    }
}
