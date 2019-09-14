<?php

//class customer
class Customer
{
	//private variables for customers
	private $customerName;
	private $phoneNumber;
	private $emailAddress;
	private $referrer;

	//constructor fr the Customer class
	function __construct($customerName, $phoneNumber, $emailAddress, $referrer)
	{
		//linking the private variables to the values in the constructor
		$this->setName($customerName);
		$this->setPhone($phoneNumber);
		$this->setEmail($emailAddress);
		$this->setReferrer($referrer);
	}
	//getmethod to get name of the customer
	public function getName()
	{
		return $this->customerName;
	}
	//setmethod to set name of the customer
	public function setName($customerName)
	{
		$this->customerName = $customerName;
	}
	//getmethod to get phone number of the customer
	public function getPhone()
	{
		return $this->phoneNumber;
	}
	//setmethod to set to get phone number of the customer
	public function setPhone($phoneNumber)
	{
		$this->phoneNumber = $phoneNumber;
	}
	//getmethod to get email of the customer
	public function getEmail()
	{
		return $this->emailAddress;
	}
	//setmethod to set email of the customer
	public function setEmail($emailAddress)
	{
		$this->emailAddress = $emailAddress;
	}
	//getmethod to get referrer of the customer
	public function
	getReferrer()
	{
		return $this->referrer;
	}
	//setmethod to set referrer of the customer
	public function setReferrer($referrer)
	{
		$this->referrer = $referrer;
	}
}
