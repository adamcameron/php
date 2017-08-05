<?php

namespace me\adamcameron\kahlan\test\acceptance\job\syncCustomersJobTests;

use me\adamcameron\kahlan\repository\JobRepository;

/** @coversDefaultClass me\adamcameron\kahlan\job\SyncCustomersJob */
class TwoRunTest extends SyncDataJobTest
{

    protected function performTestSpecifics()
    {
        $this->job->run();
        $this->job->run();
    }

    protected function mockJobDaoBehaviour($dao)
    {
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
				$booking = end($this->testData->getBookingsSince[$entryToReturn]);
				$expectedCreated = $booking['created'];
				$this->assertSame(JobRepository::SYNC_CUSTOMERS_JOB, $jobId);
				$this->assertSame($expectedCreated, $created);
			}));
    }

    protected function mockBookingDaoBehaviour($dao)
    {
		$count = 0;
		$dao->expects($this->exactly(count($this->testData->getLastRunForJob)))
			->method('getBookingsSince')
			->will($this->returnCallback(function ($dateTime, $records) use (&$count) {
				$this->assertSame($this->testData->getLastRunForJob[$count], $dateTime);
				$this->assertSame($this->recordsToProcess, $records);

				$returnValue = $this->testData->getBookingsSince[$count];
				$count++;

				return $returnValue;
			}));
    }

    protected function mockCustomerDaoBehaviour($dao)
    {
		$allBookings = array_merge(
			$this->testData->getBookingsSince[0],
			$this->testData->getBookingsSince[1]
		);
		$emails = array_map(function ($booking) {
			return $booking['emailAddress'];
		}, $allBookings);

		$count = 0;
		$dao->expects($this->exactly(count($emails)))
			->method('getCustomerByEmailAddress')
			->will($this->returnCallback(function ($emailAddress) use (&$count, $emails) {
				$this->assertSame($emails[$count], $emailAddress);
				$result = $this->testData->getCustomerByEmailAddress[$count];
				$count++;
				return $result;
			}));

		$customerData = array_map(function ($booking) {
			return [$booking['emailAddress'], $booking['id'], null];
		}, $allBookings);

		$mockedMethod = $dao
			->expects($this->exactly(count($customerData)))
			->method('saveCustomerByEmail');

		call_user_func_array([$mockedMethod, 'withConsecutive'], $this->testData->saveCustomerByEmail);
		$mockedMethod->willReturn(1);
    }
}
