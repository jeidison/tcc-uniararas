<?php

require ('./src/model/validation/Validation.php');

class UserRules
{

  private $user;
  protected $rules;

  function __construct(User $user)
  {
      $this->user = $user;
  }

  public function getRules()
  {
      return $this->rules;
  }

  public function setRules()
  {
      $this->rules = [
                         "Nome.require" => [
                            "method" => "RulesValidation::validateIsNull",
                            "parameters" => array($this->user->getName())
                          ],
                          "Nome.max" => [
                            "method" => "RulesValidation::validateMinSize",
                            "parameters" => array($this->user->getName(), 5)
                          ],
                          "Nome.min" => [
                            "method" => "RulesValidation::validateMaxSize",
                            "parameters" => array($this->user->getName(), 30)
                          ]
                      ];
  }

}



 ?>
