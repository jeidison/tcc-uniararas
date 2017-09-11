<?php

class RulesValidation
{

  private $errors = array();

  function __construct()
  {
      #
  }

  public function getErros()
  {
      return $this->errors;
  }

  private function setErrors($message)
  {
      array_push($this->errors, $message);
  }

  public function validateIsNull($field, $value)
  {
      if (is_null($value) || $value == "")
      {
        $this->setErrors("{$field} está nulo.");
      }
    return true;
  }

  public function validateMinSize($field, $value, $min = 1)
  {
      if (strlen($value) < $min)
      {
          $this->setErrors("{$field} menor que {$min} caracteres.");
      }
      return true;
  }

  public function validateMaxSize($field, $value, $max = PHP_INT_MAX)
  {
      if (strlen($value) > $max)
      {
          $this->setErrors("{$field} maior que {$max} caracteres.");
      }
      return true;
  }

  public function validateNumberOfWords($field, $value)
  {
      if (str_word_count($value) <= 1)
      {
          $this->setErrors("{$field} contém apenas 1 palavra.");
      }
      return true;
  }

  public function validateExactSize($field, $value, $size = 1)
  {
      if (strlen($value) <> $size)
      {
          $this->setErrors("{$field} não contém {$sixe} caracteres.");
      }
      return true;
  }

  public function validateValueList($field, $value, Array $listValues)
  {
      if (!in_array($value, $listValues))
      {
          $this->setErrors("{$field} contém um valor inválido.");
      }
      return true;
  }

  public function validateLargerDate($field, $date)
  {
      date_default_timezone_set('America/Sao_Paulo');
      $currentDate = strtotime(date('d-m-Y'));

      if (strtotime($date) > $currentDate)
      {
          $this->setErrors("{$field} informada é maior que a data corrente.");
      }
      return true;
  }

  public function validateMinDate($field, $date, $minDate = "01/01/1900")
  {
      if(strtotime($date) <= strtotime($minDate))
      {
          $this->setErrors("{$field} informada é inferior a {$minDate}.");
      }
      return true;
  }

  public function validateFormatDate($field, $date, $format = "Y-m-d")
  {
      $dateCreate = date_create($date);

      if (date_format($dateCreate, $format) != $date)
      {
          $this->setErrors("{$field} informada não está no formato {$format}.");
      }
      return true;
  }

  public function validateEmail($field, $email)
  {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
          $this->setErrors("{$field}: {$email} é inválido.");
      }
      return true;
  }

}

 ?>
