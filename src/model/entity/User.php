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

    /**
     * @codeCoverageIgnore
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDateBirth()
    {
        return $this->date_birth;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setDateBirth($date_birth)
    {
        $this->date_birth = $date_birth;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}
