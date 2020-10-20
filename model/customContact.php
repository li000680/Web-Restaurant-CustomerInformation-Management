<?php
class customContact
{
    var $id;
    var $customerName;
    var $emailAddress;
    var $phoneNumber;
    var $referral;

    function __construct($par1, $par2, $par3, $par4, $par5)
    {
        $this->id = $par1;
        $this->customerName = $par2;
        $this->phoneNumber = $par3;
        $this->emailAddress = $par4;
        $this->referral = $par5;
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->customerName;
    }

    function getEmailAddress()
    {
        return $this->emailAddress;
    }

    function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    function getReferral()
    {
        return $this->referral;
    }
}


