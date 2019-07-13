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


}