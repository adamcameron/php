<?php

namespace me\adamcameron\kahlan\repository;

use me\adamcameron\kahlan\dao\CustomerDAO;
use me\adamcameron\kahlan\model\Customer;

class CustomerRepository
{
    public $dao;

    public function __construct(CustomerDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getCustomerByEmailAddress(string $emailAddress) : ?Customer
    {
        $customerData = $this->dao->getCustomerByEmailAddress($emailAddress);

        if (is_null($customerData)) {
            return null;
        }

        return new Customer(
            $customerData['bookingId'],
            $customerData['emailAddress'],
            $customerData['previousBookingId']
        );
    }

    public function saveCustomers(array $customers) : int
    {
        $rowsUpdated = array_reduce($customers, function (int $count, Customer $customer) {
            $rows = $this->dao->saveCustomerByEmail(
                $customer->emailAddress,
                $customer->bookingId,
                $customer->previousBookingId
            );
            $count = $count + $rows;

            return $count;
        }, 0);

        return $rowsUpdated;
    }
}
