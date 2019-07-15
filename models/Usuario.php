<?php


class Usuario extends Database implements ORMInterface
{
    protected $id;
    protected $id_perfil;
    protected $login;
    protected $senha;
    protected $nome;
    protected $data_inscricao;
    protected $imagem;
    protected $assinatura;

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
    public function getIdPerfil()
    {
        return $this->id_perfil;
    }

    /**
     * @param mixed $id_perfil
     */
    public function setIdPerfil($id_perfil)
    {
        $this->id_perfil = $id_perfil;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
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
    public function getDataInscricao()
    {
        return $this->data_inscricao;
    }

    /**
     * @param mixed $data_inscricao
     */
    public function setDataInscricao($data_inscricao)
    {
        $this->data_inscricao = $data_inscricao;
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

    /**
     * @return mixed
     */
    public function getAssinatura()
    {
        return $this->assinatura;
    }

    /**
     * @param mixed $assinatura
     */
    public function setAssinatura($assinatura)
    {
        $this->assinatura = $assinatura;
    }

    public static function getDB()
    {
        return Database::getDB();
    }

    public function insert()
    {
        $db = self::getDB();
        $sql = "INSERT INTO usuario
					(
					 id_perfil,
					 nome,
					 descricao,
					 imagem
					 )
			    VALUES
					(
					 :id_perfil,
					 :nome,
					 :descricao,
					 :imagem
					 )";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_perfil' => $this->getIdSecao(),
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':imagem' => $this->getImagem()
        ]);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = self::getDB();
        $sql = "UPDATE usuario SET
					 id_perfil = :id_perfil,
					 nome = :nome,
					 descricao = :descricao,
					 imagem = :imagem
				WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $this->getId(),
            ':id_perfil' => $this->getIdSecao(),
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':imagem' => $this->getImagem()
        ]);
    }

    public function delete()
    {
        $db = self::getDB();
        $sql = "DELETE FROM usuario 
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
                FROM usuario
                WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        $data = $stmt->fetch();
        $objeto = new Usuario();
        $objeto->setId($id);
        $objeto->setIdSecao( $data['id_perfil'] );
        $objeto->setNome( $data['nome'] );
        $objeto->setDescricao( $data['descricao'] );
        $objeto->setImagem( $data['imagem'] );
        return $objeto;
    }

    public static function findAll()
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM usuario";
        $data = $db->query($sql);
        $arrObjeto = [];
        foreach ($data as $item) {
            $objeto = new Usuario();
            $objeto->setId( $item['id'] );
            $objeto->setIdSecao( $item['id_perfil'] );
            $objeto->setNome( $item['nome'] );
            $objeto->setDescricao( $item['descricao'] );
            $objeto->setImagem( $item['imagem'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }


}