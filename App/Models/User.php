<?php

    namespace App\models;

    class User
    {
        private static $table = 'users';

        public static function select(int $id)
        {
            $connPdo = new \PDO(DBDRIVE . ': host='. DBHOST. '; dbname='. DBNAME, DBUSER, DBPASS);

            $qry = 'SELECT * FROM '.self::$table. ' WHERE id = :id';

            $stmt = $connPdo->prepare($qry);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            
            if($stmt->rowCount() > 0){

                return $stmt->fetch(\PDO::FETCH_ASSOC);
            } else {    

                throw new \Exception("Nenhum usuário encontrado!");
                
            }
        }

        public static function selectAll()
        {
            $connPdo = new \PDO(DBDRIVE . ': host='. DBHOST. '; dbname='. DBNAME, DBUSER, DBPASS);

            $qry = 'SELECT * FROM '.self::$table;

            $stmt = $connPdo->prepare($qry);
            $stmt->execute();
            
            if($stmt->rowCount() > 0){

                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {    

                throw new \Exception("Nenhum usuário encontrado!");
                
            }
        }

        public static function insert($data)
        {
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

            $sql = 'INSERT INTO '.self::$table.' (email, senha, nome) VALUES (:em, :se, :no)';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':em', $data['email']);
            $stmt->bindValue(':se', $data['senha']);
            $stmt->bindValue(':no', $data['nome']);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Usuário(a) inserido com sucesso!';
            } else {
                throw new \Exception("Falha ao inserir usuário(a)!");
            }
        }

        public static function update(int $id, array $data)
        {
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

            $sql = 'UPDATE '.self::$table.' SET email = :em, senha = :se, nome = :no WHERE id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':em', $data['email']);
            $stmt->bindValue(':se', $data['senha']);
            $stmt->bindValue(':no', $data['nome']);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Usuário(a) atualizado(a) com sucesso!';
            } else {
                throw new \Exception("Falha ao atualizar usuário(a)!");
            }
        }

        public static function delete($id)
        {
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

            $sql = 'DELETE FROM ' .self::$table. ' WHERE id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Usuário(a) excluido(a) com sucesso!';
            } else {
                throw new \Exception("Falha ao excluir usuário(a)!");
            }
        }
    }