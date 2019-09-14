<?php


class Forum extends Database implements ORMInterface
{
    protected $id;
    protected $id_secao;
    protected $nome;
    protected $descricao;
    protected $imagem;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdSecao()
    {
        return $this->id_secao;
    }

    /**
     * @param mixed $id_secao
     */
    public function setIdSecao($id_secao)
    {
        $this->id_secao = $id_secao;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public static function getDB()
    {
        return Database::getDB();
    }

    public function insert()
    {
        $db = self::getDB();
        $sql = "INSERT INTO forum
					(
					 id_secao,
					 nome,
					 descricao,
					 imagem
					 )
			    VALUES
					(
					 :id_secao,
					 :nome,
					 :descricao,
					 :imagem
					 )";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_secao' => $this->getIdSecao(),
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':imagem' => $this->getImagem()
        ]);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = self::getDB();
        $sql = "UPDATE forum SET
					 id_secao = :id_secao,
					 nome = :nome,
					 descricao = :descricao,
					 imagem = :imagem
				WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $this->getId(),
            ':id_secao' => $this->getIdSecao(),
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':imagem' => $this->getImagem()
        ]);
    }

    public function delete()
    {
        $db = self::getDB();
        $sql = "DELETE FROM forum 
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
                FROM forum
                WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        $data = $stmt->fetch();
        $objeto = new Forum();
        $objeto->setId($id);
        $objeto->setIdSecao( $data['id_secao'] );
        $objeto->setNome( $data['nome'] );
        $objeto->setDescricao( $data['descricao'] );
        $objeto->setImagem( $data['imagem'] );
        return $objeto;
    }

    public static function findAll()
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM forum";
        $data = $db->query($sql);
        $arrObjeto = [];
        foreach ($data as $item) {
            $objeto = new Forum();
            $objeto->setId( $item['id'] );
            $objeto->setIdSecao( $item['id_secao'] );
            $objeto->setNome( $item['nome'] );
            $objeto->setDescricao( $item['descricao'] );
            $objeto->setImagem( $item['imagem'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }

    public static function countByIdSecao($id_secao)
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM forum
                WHERE id_secao = :id_secao";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_secao' => $id_secao
        ]);
        $data = $stmt->fetchAll();
        return count($data);
    }

    public static function findAllByIdSecao($id_secao)
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM forum
                WHERE id_secao = :id_secao";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_secao' => $id_secao
        ]);
        $data = $stmt->fetchAll();
        $arrObjeto = [];
        foreach ($data as $item) {
            $objeto = new Forum();
            $objeto->setId( $item['id'] );
            $objeto->setIdSecao( $item['id_secao'] );
            $objeto->setNome( $item['nome'] );
            $objeto->setDescricao( $item['descricao'] );
            $objeto->setImagem( $item['imagem'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }

    
}