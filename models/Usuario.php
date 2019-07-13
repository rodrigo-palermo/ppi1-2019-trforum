<?php


class Usuario extends Database implements ORMInterface
{
    protected $id;
    protected $id_perfil;
    protected $login;
    protected $senha;
    protected $nome;
    protected $data_inscricao;
    protected $foto;
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
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
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


}