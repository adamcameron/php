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

class SingleRunTest extends TestCase
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

            $dao->expects($this->once())
                ->method('getLastRunForJob')
                ->willReturn($this->testData->getLastRunForJob);

            $lastBooking = end($this->testData->getBookingsSince);
            $dao->expects($this->once())
                ->method('setLastRunForJob')
                ->with(JobRepository::SYNC_CUSTOMERS_JOB, $lastBooking['created'])
                ->willReturn(null);

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
        $dataPath = realpath(__DIR__ . '/data/singleRunTest');
        return json_decode(file_get_contents($dataPath . '/' . $file), true);
    }
}
