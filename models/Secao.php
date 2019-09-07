<?php


class Secao
{
    protected $id;
    protected $nome;
    protected $descricao;
    protected $ordem; /* No banco deve ser UNIQUE, começando de 1. Cria nav-item para cada secao*/

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

}