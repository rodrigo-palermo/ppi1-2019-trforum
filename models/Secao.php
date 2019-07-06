<?php


class Secao extends Database implements ORMInterface
{
    protected $id;
    protected $nome;
    protected $descricao;

    public function getId() {
        return $this->id;
    }
    
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
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
        $sql = "INSERT INTO secao
					(
					 nome,
					 descricao
					 )
			    VALUES
					(
					 :nome,
					 :descricao
					 )";
        $stmt = $db->prepare($sql);
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao()
        ]);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = self::getDB();
        $sql = "UPDATE secao SET
					 nome = :nome,
					 descricao = :descricao
				WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $this->getId(),
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao()
        ]);
    }

    public function delete()
    {
        $db = self::getDB();
        $sql = "DELETE FROM secao 
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
                FROM secao
                WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
           ':id' => $id
        ]);
        $data = $stmt->fetch();
        $secao = new Secao();
        $secao->setId($id);
        $secao->setNome( $data['nome'] );
        $secao->setDescricao( $data['descricao'] );
        return $secao;
    }

    public static function findAll()
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM secao";
        $data = $db->query($sql);
        $arrSecao = [];
        foreach ($data as $item) {
            $secao = new Secao();
            $secao->setId( $item['id'] );
            $secao->setNome( $item['nome'] );
            $secao->setDescricao( $item['descricao'] );
            $arrSecao[] = $secao;
        }
        return $arrSecao;
    }
}