<?php

require 'Connection.php';

/**
 * User: jeidison
 * Date: 24/08/17
 * Time: 20:24
 */
class UserDao
{
    use Connection;

    private $connection;

    function __construct()
    {
        $this->connection = $this->connection();
    }

    public function create(User $user)
    {
        try {
            $sql = "SELECT * FROM users WHERE document = '{$user->getDocument()}'";
            $resultQuery = $this->connection->query($sql, PDO::FETCH_ASSOC);
            $result = $resultQuery->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) >= 1) {
                return ApplicationResult::forError("Já existe um usuário cadastrado com documento: " . $user->getDocument() . ".");
            }
            $reflect = new ReflectionClass($user);
            $props = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
            $attrQuery = "";
            $valuesQuery = "";
            foreach ($props as $prop => $value) {
                $value->setAccessible(true);
                $attrQuery .= $value->getName() . ",";
                $valuesQuery .= '\'' . $value->getValue($user) . '\'' . ",";
            }
            $attrQuery = rtrim($attrQuery, ',');
            $valuesQuery = rtrim($valuesQuery, ',');
            $query = "INSERT INTO users (" . $attrQuery . ") VALUES (" . $valuesQuery . ");";
            $this->connection->exec($query);
            return ApplicationResult::forSuccess("Usuário {$user->getName()} inserido com sucesso.");
        } catch (Exception $exception) {
            return ApplicationResult::forError("Erro ao inserir usuário. mensagem: ".$exception->getMessage());
        }
    }

    public function delete($idUser)
    {
        try {
            $resultQuery = $this->connection->query("SELECT * FROM users WHERE id={$idUser}", PDO::FETCH_ASSOC);
            $result = $resultQuery->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) <= 0) {
                return ApplicationResult::forError("Usuário com ID: {$idUser} não encontrado.");
            }
            $sql = "DELETE FROM users WHERE id={$idUser}";
            $this->connection->exec($sql);
            return ApplicationResult::forSuccess("Usuário com ID: {$idUser} deletado com sucesso.");
        } catch(Exception $e) {
            return ApplicationResult::forError("Erro ao deletar Usuário com ID: {$idUser}. Mensagem: {$e->getMessage()}");
        }
    }

    public function update(User $user, $idUser)
    {
      try {
          $resultQuery = $this->connection->query("SELECT * FROM users WHERE id={$idUser}", PDO::FETCH_ASSOC);
          $result = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
          if (count($result) <= 0) {
              return ApplicationResult::forError("Usuário com ID: {$idUser} não encontrado.");
          }
          $reflect = new ReflectionClass($user);
          $props = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
          $fieldsQuery = "";
          $endArray = end($props);
          foreach ($props as $prop => $value) {
              $value->setAccessible(true);
              $fieldsQuery .= $value->getName() . " = " . '\'' . $value->getValue($user) . '\'';
              if ($endArray->name != $value->getName())
              {
                  $fieldsQuery .= ', ';
              }
          }
          $query = "UPDATE users SET " . $fieldsQuery . " WHERE id = " . $idUser . ";";
          $this->connection->exec($query);
          return ApplicationResult::forSuccess("Usuário com ID: {$idUser} atualizado com sucesso.");
      } catch (Exception $exception) {
          return ApplicationResult::forError($query . "Erro ao atualizar usuário. mensagem: ".$exception->getMessage());
      }
    }

    public function read()
    {
        return $this->connection->query('SELECT * FROM users', PDO::FETCH_ASSOC);
    }

    public function find($idUser)
    {
        $resultQuery = $this->connection->query("SELECT * FROM users WHERE id={$idUser}", PDO::FETCH_ASSOC);
        $result = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) <= 0) {
            return ApplicationResult::forError("Usuário com ID: {$idUser} não encontrado.");
        }
        return ApplicationResult::forSuccess("Ok", $result);
    }

}
