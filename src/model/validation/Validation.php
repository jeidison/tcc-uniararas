<?php

require './src/utils/RulesValidation.php';

class Validation
{

  private $rules;
  private $result;

  function __construct(Array $rules)
  {
      $this->rules = $rules;
  }

  public function validate()
  {
      return $this->executeRules();
  }

  protected function executeRules()
  {
      foreach ($this->rules as $value) {
          $this->result = call_user_func_array($value['method'], $value['parameters']);
          if (!$this->result->getSuccess())
          {
              $this->result->setDetails(key($value) . $this->result->getDetails());
              return $this->result;
          }
      }
      $this->result;
  }

}


 ?>
