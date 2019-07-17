<?php


class Post extends Database implements ORMInterface
{
    protected $id;
    protected $id_topico;
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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdTopico()
    {
        return $this->id_topico;
    }

    /**
     * @param mixed $id_topico
     */
    public function setIdTopico($id_topico)
    {
        $this->id_topico = $id_topico;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
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
    public function getDataHora()
    {
        return $this->data_hora;
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
        $sql = "INSERT INTO post
					(
					 id_topico,
					 id_usuario,
					 nome,
					 descricao,
					 data_hora
					 )
			    VALUES
					(
					 :id_topico,
					 :id_usuario,
					 :nome,
					 :descricao,
					 :data_hora
					 )";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_topico' => $this->getIdTopico(),
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
        $sql = "UPDATE post SET
					 id_topico = :id_topico,
					 id_usuario = :id_usuario,
					 nome = :nome,
					 descricao = :descricao,
					 data_hora = :data_hora
				WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $this->getId(),
            ':id_topico' => $this->getIdTopico(),
            ':id_usuario' => $this->getIdUsuario(),
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':data_hora' => $this->getDataHora()
        ]);
    }

    public function delete()
    {
        $db = self::getDB();
        $sql = "DELETE FROM post 
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
                FROM post
                WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        $data = $stmt->fetch();
        $objeto = new Post();
        $objeto->setId($id);
        $objeto->setIdTopico( $data['id_topico'] );
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
                FROM post";
        $data = $db->query($sql);
        $arrObjeto = [];
        foreach ($data as $item) {
            $objeto = new Post();
            $objeto->setId( $item['id'] );
            $objeto->setIdTopico( $item['id_topico'] );
            $objeto->setIdUsuario( $item['id_usuario'] );
            $objeto->setNome( $item['nome'] );
            $objeto->setDescricao( $item['descricao'] );
            $objeto->setDataHora( $item['data_hora'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }

    public static function countByIdTopico($id_topico)
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM post
                WHERE id_topico = :id_topico";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_topico' => $id_topico
        ]);
        $data = $stmt->fetchAll();
        return count($data);
    }

    public static function findAllByIdTopico($id_topico)
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM post
                WHERE id_topico = :id_topico";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_topico' => $id_topico
        ]);
        $data = $stmt->fetchAll();
        $arrObjeto = [];
        foreach ($data as $item) {
            $objeto = new Post();
            $objeto->setId( $item['id'] );
            $objeto->setIdTopico( $item['id_topico'] );
            $objeto->setIdUsuario( $item['id_usuario'] );
            $objeto->setNome( $item['nome'] );
            $objeto->setDescricao( $item['descricao'] );
            $objeto->setDataHora( $item['data_hora'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }


}