<?php

require 'Connecion.php';
require '../entity/User.php';

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

    }

    public function delete($idUser)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE id={$idUser}");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
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

    public function update()
    {

    }

    public function read()
    {
        return $this->connection->query('SELECT * FROM users', PDO::FETCH_ASSOC);
    }

}