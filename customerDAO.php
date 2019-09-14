<?php
require_once('abstractDAO.php');
require_once('customer.php');

class CustomerDAO extends abstractDAO
{

    function __construct()
    {
        try {
            parent::__construct();
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }


    public function getCustomer()
    {
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM mailinglist');
        $customers = array();

        if ($result->num_rows >= 1) {
            while ($row = $result->fetch_assoc()) {
                //Create a new employee object, and add it to the array.
                $customer = new customer($row['customerName'], $row['phoneNumber'], $row['emailAddress'], $row['referrer']);
                $customers[] = $customer;
            }
            $result->free();
            return $customers;
        }
        $result->free();
        return false;
    }
    //gets customers from the database
    public function getCustomers($customerName)
    {

        $query = 'SELECT * FROM mailinglist WHERE customerName = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('s', $customerName);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $temp = $result->fetch_assoc();
            $customer = new customer($temp['customerName'], $temp['phoneNumber'], $temp['emailAddress'], $temp['referrer']);
            $result->free();
            return $customer;
        }
        $result->free();
        return false;
    }

    //adds customers to the database
    public function addCustomer($customer)
    {

        if (empty($customer->getName())) {
            return "Name cannot be empty be and must be a letter";
        }
        if (!$this->mysqli->connect_errno) {

            $query = 'INSERT INTO mailinglist(customerName,phoneNumber,emailAddress,referrer) VALUES (?,?,?,?)';

            $stmt = $this->mysqli->prepare($query);

            $names = $customer->getName();
            $phones = $customer->getPhone();
            $emails = $customer->getEmail();
            $refer = $customer->getReferrer();
            //specify the datatype of variables to be inserted into the database
            $stmt->bind_param(
                'ssss',
                $names,
                $phones,
                $emails,
                $refer,
            );

            $stmt->execute();

            if ($stmt->error) {
                return $stmt->error;
            } else {
                return $customer->getName() . '    added successfully!';
            }
        } else {
            return  'Could not connect to Database.';
        }
    }

    public function deleteCustomer($custID)
    {
        if (!$this->mysqli->connect_errno) {

            $query = 'DELETE FROM mailinglist WHERE _Id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $custID);
            $stmt->execute();
            if ($stmt->error) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
