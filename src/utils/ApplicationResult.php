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
    private $data;

    function __construct($details, $success, $data = null)
    {
        $this->details = $details;
        $this->success = $success;
        $this->data = $data;
    }

    public static function forError($message = "", $data = null)
    {
        return new self($message, false, $data);
    }

    public static function forSuccess($message = "", $data = null)
    {
        return new self($message, true, $data);
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

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}
