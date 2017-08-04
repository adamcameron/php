<?php

namespace me\adamcameron\kahlan\test\phpunit\acceptance\job;

use me\adamcameron\kahlan\app\Container;
use me\adamcameron\kahlan\dao\BookingDAO;
use me\adamcameron\kahlan\dao\CustomerDAO;
use me\adamcameron\kahlan\dao\JobDAO;
use me\adamcameron\kahlan\job\SyncCustomersJob;
use me\adamcameron\kahlan\repository\JobRepository;
use Monolog\Handler\NullHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class TwoRunTest extends TestCase
{
    private $testData;
    private $container;
    private $recordsToProcess;

    public function setup()
    {
        $this->loadTestData();
        $this->setTestContainer();
    }

    public function testSingleRun()
    {
        $this->recordsToProcess = 5;
        $job = new SyncCustomersJob($this->container, ['recordsToProcess' => $this->recordsToProcess]);

        $job->run();
    }

    private function setTestContainer()
    {
        $container = new Container();

        $this->setMockedLogger($container);
        $this->setMockedJobDao($container);
        $this->setMockedBookingDao($container);
        $this->setMockedCustomerDao($container);

        $this->container = $container;
    }

    private function setMockedLogger($container)
    {
        $log = new Logger('null');
        $log->pushHandler(new NullHandler());

        $container['service.logger'] = $log;
    }

    private function setMockedJobDao($container)
    {
        $container['dao.job'] = function () {
            $dao = $this->getMockBuilder(JobDAO::class)
                ->disableOriginalConstructor()
                ->getMock();

            $counts = [
                'getLastRunForJob' => 0,
                'setLastRunForJob' => 0
            ];

            $dao->expects($this->exactly(2))
                ->method('getLastRunForJob')
                ->will($this->returnCallback(function () use (&$counts) {
                    $entryToReturn = $counts['getLastRunForJob']++;
                    return $this->testData->getLastRunForJob[$entryToReturn];
                }));

            $dao->expects($this->exactly(2))
                ->method('setLastRunForJob')
                ->will($this->returnCallback(function ($jobId, $created) use (&$counts) {
                    $entryToReturn = $counts['setLastRunForJob']++;
                    $booking = last($this->testData->getBookingsSince[$entryToReturn]);
                    $expectedCreated = $booking['created'];
                    $this->assertSame(JobRepository::SYNC_CUSTOMERS_JOB, $jobId);
                    $this->assertSame($expectedCreated, $created);
                }));

            return $dao;
        };
    }

    private function setMockedBookingDao($container)
    {
        $container['dao.booking'] = function () {
            $dao = $this->getMockBuilder(BookingDAO::class)
                ->disableOriginalConstructor()
                ->getMock();

            $dao->expects($this->once())
                ->method('getBookingsSince')
                ->with($this->testData->getLastRunForJob, $this->recordsToProcess)
                ->willReturn($this->testData->getBookingsSince);

            return $dao;
        };
    }

    private function setMockedCustomerDao($container)
    {
        $container['dao.customer'] = function () {
            $dao = $this->getMockBuilder(CustomerDAO::class)
                ->disableOriginalConstructor()
                ->getMock();

            $emails = array_map(function ($booking) {
                return [$booking['emailAddress']];
            }, $this->testData->getBookingsSince);

            $mockedMethod = $dao
                ->expects($this->exactly(count($emails)))
                ->method('getCustomerByEmailAddress');

            call_user_func_array([$mockedMethod, 'withConsecutive'], $emails);
            $mockedMethod->willReturn($this->testData->getCustomerByEmailAddress);

            $customerData = array_map(function ($booking) {
                return [$booking['emailAddress'], $booking['id'], null];
            }, $this->testData->getBookingsSince);

            $mockedMethod = $dao
                ->expects($this->exactly(count($customerData)))
                ->method('saveCustomerByEmail');

            call_user_func_array([$mockedMethod, 'withConsecutive'], $customerData);
            $mockedMethod->willReturn(1);

            return $dao;
        };
    }

    private function loadTestData()
    {

        $this->testData = (object)[
            'getLastRunForJob' => $this->decodeJsonFile('getLastRunForJob.json'),
            'getBookingsSince' => $this->decodeJsonFile('getBookingsSince.json'),
            'getCustomerByEmailAddress' => $this->decodeJsonFile('getCustomerByEmailAddress.json')
        ];
    }

    private function decodeJsonFile($file)
    {
        $dataPath = realpath(__DIR__ . '/data/twoRunTest');
        return json_decode(file_get_contents($dataPath . '/' . $file), true);
    }
}
