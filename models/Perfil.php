<?php


class Perfil extends Database implements ORMInterface
{
    protected $id;
    protected $nome;

    public function getId() {
        return $this->id;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setId($id) {
        $this->id = $id;
    }
}