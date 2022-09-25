<?php

class office
{
    public $officeName;
    public $address;
    public $city;
    public $phone;

    public function setOfficeName($new)
    {
        $this->officeName = $new;
    }

    public function setAddress($new)
    {
        $this->address = $new;
    }

    public function setCity($new)
    {
        $this->city = $new;
    }

    public function setPhone($new)
    {
        $this->phone = $new;
    }
}
