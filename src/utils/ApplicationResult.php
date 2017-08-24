<?php

/**
 * User: jeidison
 * Date: 24/08/17
 * Time: 20:16
 */
class ApplicationResult
{

    private $details;
    private $success; //boolean

    function __construct($details, $success)
    {
        $this->details = $details;
        $this->success = $success;
    }

    public static function forError($message)
    {
        return new self($message, false);
    }

    public static function forSuccess($message)
    {
        return new self($message, true);
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;
    }

    public function getSuccess()
    {
        return $this->success;
    }

    public function setSuccess($success)
    {
        $this->success = $success;
    }

}