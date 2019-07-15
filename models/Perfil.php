<?php


class Perfil extends Database implements ORMInterface
{
    protected $id;
    protected $nome;

    public function getId() {
        return $this->id;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public static function getDB()
    {
        return Database::getDB();
    }

    public function insert()
    {
        $db = self::getDB();
        $sql = "INSERT INTO perfil
					(
					 nome
					 )
			    VALUES
					(
					 :nome
					 )";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nome' => $this->getNome()
        ]);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = self::getDB();
        $sql = "UPDATE perfil SET
					 nome = :nome
				WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $this->getId(),
            ':nome' => $this->getNome()
        ]);
    }

    public function delete()
    {
        $db = self::getDB();
        $sql = "DELETE FROM perfil 
				WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $this->getId()
        ]);
    }

    public static function findById($id)
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM perfil
                WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        $data = $stmt->fetch();
        $objeto = new Perfil();
        $objeto->setId($id);
        $objeto->setNome( $data['nome'] );
        return $objeto;
    }

    public static function findAll()
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM perfil";
        $data = $db->query($sql);
        $arrObjeto = [];
        foreach ($data as $item) {
            $objeto = new Perfil();
            $objeto->setId( $item['id'] );
            $objeto->setNome( $item['nome'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }
}