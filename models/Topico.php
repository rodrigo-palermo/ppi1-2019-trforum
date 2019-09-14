<?php


class Topico extends Database implements ORMInterface
{
    protected $id;
    protected $id_forum;
    protected $id_usuario;
    protected $nome;
    protected $descricao;
    protected $data_hora;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdForum()
    {
        return $this->id_forum;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return mixed
     */
    public function getDataHora()
    {
        return $this->data_hora;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $id_forum
     */
    public function setIdForum($id_forum)
    {
        $this->id_forum = $id_forum;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @param mixed $data_hora
     */
    public function setDataHora($data_hora)
    {
        $this->data_hora = $data_hora;
    }

    public static function getDB()
    {
        return Database::getDB();
    }

    public function insert()
    {
        $db = self::getDB();
        $sql = "INSERT INTO topico
					(
					 id_forum,
					 id_usuario,
					 nome,
					 descricao,
					 data_hora
					 )
			    VALUES
					(
					 :id_forum,
					 :id_usuario,
					 :nome,
					 :descricao,
					 :data_hora
					 )";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_forum' => $this->getIdForum(),
            ':id_usuario' => $this->getIdUsuario(),
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':data_hora' => $this->getDataHora()
        ]);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = self::getDB();
        $sql = "UPDATE topico SET
					 id_forum = :id_forum,
					 id_usuario = :id_usuario,
					 nome = :nome,
					 descricao = :descricao,
					 data_hora = :data_hora
				WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $this->getId(),
            ':id_forum' => $this->getIdForum(),
            ':id_usuario' => $this->getIdUsuario(),
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':data_hora' => $this->getDataHora()
        ]);
    }

    public function delete()
    {
        $db = self::getDB();
        $sql = "DELETE FROM topico 
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
                FROM topico
                WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        $data = $stmt->fetch();
        $objeto = new Topico();
        $objeto->setId($id);
        $objeto->setIdForum( $data['id_forum'] );
        $objeto->setIdUsuario( $data['id_usuario'] );
        $objeto->setNome( $data['nome'] );
        $objeto->setDescricao( $data['descricao'] );
        $objeto->setDataHora( $data['data_hora'] );
        return $objeto;
    }

    public static function findAll()
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM topico";
        $data = $db->query($sql);
        $arrObjeto = [];
        foreach ($data as $item) {
            $objeto = new Topico();
            $objeto->setId( $item['id'] );
            $objeto->setIdForum( $item['id_forum'] );
            $objeto->setIdUsuario( $item['id_usuario'] );
            $objeto->setNome( $item['nome'] );
            $objeto->setDescricao( $item['descricao'] );
            $objeto->setDataHora( $item['data_hora'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }

    public static function countByIdForum($id_forum)
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM topico
                WHERE id_forum = :id_forum";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_forum' => $id_forum
        ]);
        $data = $stmt->fetchAll();
        return count($data);
    }

    public static function findAllByIdForum($id_forum)
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM topico
                WHERE id_forum = :id_forum";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_forum' => $id_forum
        ]);
        $data = $stmt->fetchAll();
        $arrObjeto = [];
        foreach ($data as $item) {
            $objeto = new Topico();
            $objeto->setId( $item['id'] );
            $objeto->setIdForum( $item['id_forum'] );
            $objeto->setIdUsuario( $item['id_usuario'] );
            $objeto->setNome( $item['nome'] );
            $objeto->setDescricao( $item['descricao'] );
            $objeto->setDataHora( $item['data_hora'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }
    public static function findIdLastAddedByUser($id_usuario)
    {
        $db = self::getDB();
        $sql = "SELECT id
                FROM topico
                WHERE id_usuario = :id_usuario
                ORDER BY id DESC 
                LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_usuario' => $id_usuario
        ]);
        $data = $stmt->fetch();
//        $objeto = new Topico();
//        $objeto->setId($id);
//        $objeto->setIdForum( $data['id_forum'] );
//        $objeto->setIdUsuario( $data['id_usuario'] );
//        $objeto->setNome( $data['nome'] );
//        $objeto->setDescricao( $data['descricao'] );
//        $objeto->setDataHora( $data['data_hora'] );
        return $data['id']+1;
    }


}