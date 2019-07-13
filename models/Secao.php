<?php


class Secao extends Database implements ORMInterface
{
    protected $id;
    protected $nome;
    protected $descricao;
    protected $ordem; /* No banco deve ser UNIQUE. Cria nav-item para cada secao*/

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
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

    public function setOrdem($ordem) {
        $this->ordem = $ordem;
    }

    public function getOrdem() {
        return $this->ordem;
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
					 descricao,
					 ordem
					 )
			    VALUES
					(
					 :nome,
					 :descricao,
					 :ordem
					 )";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':ordem' => $this->getOrdem()
        ]);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = self::getDB();
        $sql = "UPDATE secao SET
					 nome = :nome,
					 descricao = :descricao,
                     ordem = :ordem
				WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $this->getId(),
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':ordem' => $this->getOrdem()
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
        $objeto = new Secao();
        $objeto->setId($id);
        $objeto->setNome( $data['nome'] );
        $objeto->setDescricao( $data['descricao'] );
        $objeto->setOrdem( $data['ordem'] );
        return $objeto;
    }

    public static function findAll()
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM secao";
        $data = $db->query($sql);
        $arrObjeto = [];
        foreach ($data as $item) {
            $objeto = new Secao();
            $objeto->setId( $item['id'] );
            $objeto->setNome( $item['nome'] );
            $objeto->setDescricao( $item['descricao'] );
            $objeto->setOrdem( $item['ordem'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }

    public static function findByOrder($ordem)
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM secao
                WHERE ordem = :ordem";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':ordem' => $ordem
        ]);
        $data = $stmt->fetch();
        $objeto = new Secao();
        $objeto->setId($data['id']);
        $objeto->setNome( $data['nome'] );
        $objeto->setDescricao( $data['descricao'] );
        $objeto->setOrdem( $data['ordem'] );
        return $objeto;
    }
}