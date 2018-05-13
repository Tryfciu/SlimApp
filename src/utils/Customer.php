<?php

class Customer
{
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;
    public $address;
    public $city;
    public $voivodeship;

    public function __construct(string $firstName,   string $lastName,
                                string $phoneNumber, string $email,
                                string $address,     string $city,
                                string $voivodeship)
    {
        $this->first_name   = $firstName;
        $this->last_name    = $lastName;
        $this->phone_number = $phoneNumber;
        $this->email        = $email;
        $this->address      = $address;
        $this->city         = $city;
        $this->voivodeship  = $voivodeship;
    }
}

?>