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
     * @param array $request
     *
     * @return Customer|bool
     */
    public function create(array $request)
    {
        $customer = new Customer();
        $customer->fill($request);
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
     * @param array $request
     *
     * @return Customer|bool
     */
    public function update($id, array $request)
    {
        $customer = $this->findById($id);
        if (!$customer) {
            return false;
        }

        $customer->fill($request);
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
    public function destroy($id)
    {
        return Customer::destroy($id) > 0;
    }

    /**
     * @return Customer[]
     */
    public function all()
    {
        return Customer::all();
    }

    /**
     * @param $id
     *
     * @return Customer|null
     */
    public function findById($id)
    {
        return Customer::where('id', $id)->first();
    }
}