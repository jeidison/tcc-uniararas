<?php

/**
 * User: jeidison
 * Date: 24/08/17
 * Time: 20:26
 */
class User
{

    private $name;
    private $document;
    private $sex;
    private $date_birth;
    private $phone;
    private $email;
    private $status;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function setDocument($document)
    {
        $this->document = $document;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    public function getDateBirth()
    {
        return $this->date_birth;
    }

    public function setDateBirth($date_birth)
    {
        $this->date_birth = $date_birth;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

}