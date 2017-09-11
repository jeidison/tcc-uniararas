<?php

//require ('../../utils/RulesValidation.php');
//require ('../../utils/ApplicationResult.php');

class UserValidation
{

  private $user;

  function __construct(User $user)
  {
      $this->user = $user;
  }

  public function validate()
  {
      $resultRules = $this->executeRules();
      if(count($resultRules) > 0)
      {
          return ApplicationResult::forError($resultRules[0]);
      }
      return ApplicationResult::forSuccess();
  }

  private function executeRules()
  {
      $Rules = new RulesValidation();
      // Validação do Nome
      $Rules->validateIsNull("Nome", $this->user->getName());
      $Rules->validateMaxSize("Nome", $this->user->getName(), 30);
      $Rules->validateMinSize("Nome", $this->user->getName(), 5);
      $Rules->validateNumberOfWords("Nome", $this->user->getName());
      // Validação do Documento
      $Rules->validateIsNull("Documento", $this->user->getDocument());
      $Rules->validateExactSize("Documento", $this->user->getDocument(), 11);
      // Validação do Sexo
      $Rules->validateIsNull("Sexo", $this->user->getSex());
      $Rules->validateValueList("Sexo", $this->user->getSex(), array('F', 'M'));
      // Validação da DN
      $Rules->validateIsNull("Data de Nascimento", $this->user->getDateBirth());
      $Rules->validateLargerDate("Data de Nascimento", $this->user->getDateBirth());
      $Rules->validateFormatDate("Data de Nascimento",$this->user->getDateBirth(), "Y-m-d");
      $Rules->validateMinDate("Data de Nascimento", $this->user->getDateBirth(), "01/01/1990");
      // Validação do Telefone
      $Rules->validateExactSize("Telefone", $this->user->getPhone(),  11);
      // Validação do Email
      $Rules->validateIsNull("E-mail", $this->user->getEmail());
      $Rules->validateEmail("E-mail", $this->user->getEmail());
      return $Rules->getErros();
  }

}



 ?>
