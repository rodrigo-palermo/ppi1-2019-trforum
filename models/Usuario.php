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
					 login,
					 senha,
					 nome,
					 data_inscricao,
					 imagem,
					 assinatura
					 )
			    VALUES
					(
					 :id_perfil,
					 :login,
					 :senha,
					 :nome,
					 :data_inscricao,
					 :imagem,
					 :assinatura
					 )";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_perfil' => $this->getIdPerfil(),
            ':login' => $this->getLogin(),
            ':senha' => $this->getSenha(),
            ':nome' => $this->getNome(),
            ':data_inscricao' => $this->getDataInscricao(),
            ':imagem' => $this->getImagem(),
            ':assinatura' => $this->getAssinatura()
        ]);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = self::getDB();
        $sql = "UPDATE usuario SET
					 id_perfil = :id_perfil,
					 login = :login,
					 senha = :senha,
					 nome = :nome,
					 data_inscricao = :data_inscricao,
					 imagem = :imagem,
					 assinatura = :assinatura
				WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $this->getId(),
            ':id_perfil' => $this->getIdPerfil(),
            ':login' => $this->getLogin(),
            ':senha' => $this->getSenha(),
            ':nome' => $this->getNome(),
            ':data_inscricao' => $this->getDataInscricao(),
            ':imagem' => $this->getImagem(),
            ':assinatura' => $this->getAssinatura()
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
        $objeto->setId($id);  // parametro da busca
        $objeto->setIdPerfil( $data['id_perfil'] );
        $objeto->setLogin( $data['login'] );
        $objeto->setSenha( $data['senha'] );
        $objeto->setNome( $data['nome'] );
        $objeto->setDataInscricao( $data['data_inscricao'] );
        $objeto->setImagem( $data['imagem'] );
        $objeto->setAssinatura( $data['assinatura'] );
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
            $objeto->setIdPerfil( $item['id_perfil'] );
            $objeto->setLogin( $item['login'] );
            $objeto->setSenha( $item['senha'] );
            $objeto->setNome( $item['nome'] );
            $objeto->setDataInscricao( $item['data_inscricao'] );
            $objeto->setImagem( $item['imagem'] );
            $objeto->setAssinatura( $item['assinatura'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }

    public static function findByLogin($login)
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM usuario
                WHERE login = :login";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':login' => $login
        ]);
        $data = $stmt->fetch();
        $objeto = new Usuario();
        $objeto->setId($data['id']);
        $objeto->setIdPerfil( $data['id_perfil'] );
        $objeto->setLogin( $login );  //parametro da busca
        $objeto->setSenha( $data['senha'] );
        $objeto->setNome( $data['nome'] );
        $objeto->setDataInscricao( $data['data_inscricao'] );
        $objeto->setImagem( $data['imagem'] );
        $objeto->setAssinatura( $data['assinatura'] );
        return $objeto;
    }


}