<?php

namespace me\adamcameron\kahlan\test\acceptance\job\syncCustomersJobTests;

use me\adamcameron\kahlan\repository\JobRepository;

/** @coversDefaultClass me\adamcameron\kahlan\job\SyncCustomersJob */
class SingleRunTest extends SyncDataJobTest
{

    protected function mockJobDaoBehaviour($dao)
    {
		$dao->expects($this->once())
			->method('getLastRunForJob')
			->willReturn($this->testData->getLastRunForJob);

		$lastBooking = end($this->testData->getBookingsSince);
		$dao->expects($this->once())
			->method('setLastRunForJob')
			->with(JobRepository::SYNC_CUSTOMERS_JOB, $lastBooking['created'])
			->willReturn(null);
    }

	protected function mockBookingDaoBehaviour($dao)
    {
        $dao->expects($this->once())
            ->method('getBookingsSince')
            ->with($this->testData->getLastRunForJob, $this->recordsToProcess)
            ->willReturn($this->testData->getBookingsSince);
    }

	protected function mockCustomerDaoBehaviour($dao)
    {
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
    }
}
