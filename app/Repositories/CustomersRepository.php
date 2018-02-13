<?php

namespace App\Repositories;

use App\Models\Customer;
use Exception;

class CustomersRepository
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * CustomersRepository constructor.
     *
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @param array $data
     *
     * @return Customer|bool
     */
    public function create(array $data)
    {
        $customer = new Customer();
        $customer->fill($data);
        try {
            $customer->save();
        } catch (Exception $e) {
            // Send error to bugsnag, sentry or similar...

            return false;
        }

        return $customer;
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return Customer|bool
     */
    public function update($id, array $data)
    {
        $customer = $this->findById($id);
        if (!$customer) {
            return false;
        }

        $customer->fill($data);
        try {
            $customer->save();
        } catch (Exception $e) {
            // Send error to bugsnag, sentry or similar...

            return false;
        }

        return $customer;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete($id)
    {
        return Customer::destroy($id) > 0;
    }

    /**
     * @return Customer[]
     */
    public function findAll()
    {
        return Customer::all();
    }

    /**
     * @param int $id
     *
     * @return Customer|null
     */
    public function findById($id)
    {
        return Customer::where('id', $id)->first();
    }

    /**
     * @return mixed
     */
    public function lists()
    {
        return Customer::lists('name', 'id');
    }
}
