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




}