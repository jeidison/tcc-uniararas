<?php

require 'ApplicationResult.php';

class RulesValidation
{

  function __construct()
  {
      #
  }

  public static function validateIsNull($value)
  {
      if (is_null($value) || $value == "")
      {
        return ApplicationResult::forError(" está nulo.");
      }
    return ApplicationResult::forSuccess();
  }

  public static function validateMinSize($value, $min = 1)
  {
      if (count($value) < $min)
      {
          return ApplicationResult::forError(" menor que {$min} caracteres.");
      }
      return ApplicationResult::forSuccess();
  }

  public static function validateMaxSize($value, $max = PHP_INT_MAX)
  {
      if (count($value) > $max)
      {
          return ApplicationResult::forError(" maior que {$max} caracteres.");
      }
      return ApplicationResult::forSuccess();
  }

  public static function validateNumberOfWords($value)
  {
      if (str_word_count($value) <= 1)
      {
          return ApplicationResult::forError(" contém apenas 1 palavra.");
      }
      return ApplicationResult::forSuccess();
  }

  public static function validateExactSize($value, $size = 1)
  {
      if (count($value) <> $size)
      {
          return ApplicationResult::forError(" não contém {$sixe} caracteres.");
      }
      return ApplicationResult::forSuccess();
  }

  public static function validateValueList($value, Array $listValues)
  {
      if (!in_array($value, $listValues))
      {
          return ApplicationResult::forError(" contém um valor inválido.");
      }
      return ApplicationResult::forSuccess();
  }

  public static function validateLargerDate($date)
  {
      date_default_timezone_set('America/Sao_Paulo');
      $currentDate = strtotime(date('d-m-Y'));

      if (strtotime($date) > $currentDate)
      {
          return ApplicationResult::forError(" informada é maior que a data corrente.");
      }
      return ApplicationResult::forSuccess();
  }

  public static function validateMinDate($date, $minDate = "01/01/1900")
  {
      if(strtotime($date) >= strtotime($minDate))
      {
          return ApplicationResult::forError(" informada é inferior a {$minDate}.");
      }
      return ApplicationResult::forSuccess();
  }

  public static function validateFormatDate($date, $format = "d-m-Y")
  {
      if (!date_format($date, $format) == $date)
      {
          return ApplicationResult::forError(" informada não está no formato {$format}.");
      }
      return ApplicationResult::forSuccess();
  }

  public static function validateEmail($email)
  {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
          return ApplicationResult::forError(" {$email} é inválido.");
      }
      return ApplicationResult::forSuccess();
  }

}

 ?>
