<?php

require_once __DIR__.'/Secao.php';

class SecaoDAO
{
    protected $id;
    protected $nome;
    protected $descricao;
    protected $ordem; /* No banco deve ser UNIQUE, começando de 1. Cria nav-item para cada secao*/

    public static function getDB() {
        $conn = new PDO('mysql:host=localhost;dbname=forum','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    public function insert()
    {
        $db = self::getDB();
        $sql = "INSERT INTO secao
					(
					 nome,
					 descricao,
					 ordem
					 )
			    VALUES
					(
					 :nome,
					 :descricao,
					 :ordem
					 )";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':ordem' => $this->getOrdem()
        ]);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = self::getDB();
        $sql = "UPDATE secao SET
					 nome = :nome,
					 descricao = :descricao,
                     ordem = :ordem
				WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $this->getId(),
            ':nome' => $this->getNome(),
            ':descricao' => $this->getDescricao(),
            ':ordem' => $this->getOrdem()
        ]);
    }

    public function delete()
    {
        $db = self::getDB();
        $sql = "DELETE FROM secao 
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
                FROM secao
                WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
           ':id' => $id
        ]);
        $data = $stmt->fetch();
        $objeto = new Secao();
        $objeto->setId($id);
        $objeto->setNome( $data['nome'] );
        $objeto->setDescricao( $data['descricao'] );
        $objeto->setOrdem( $data['ordem'] );
        return $objeto;
    }

    public static function findAll()
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM secao";
        $data = $db->query($sql);
        $arrObjeto = [];
        foreach ($data as $item) {
            $objeto = new Secao();
            $objeto->setId( $item['id'] );
            $objeto->setNome( $item['nome'] );
            $objeto->setDescricao( $item['descricao'] );
            $objeto->setOrdem( $item['ordem'] );
            $arrObjeto[] = $objeto;
        }
        return $arrObjeto;
    }

    public static function findByOrder($ordem)
    {
        $db = self::getDB();
        $sql = "SELECT *
                FROM secao
                WHERE ordem = :ordem";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':ordem' => $ordem
        ]);
        $data = $stmt->fetch();
        $objeto = new Secao();
        $objeto->setId($data['id']);
        $objeto->setNome( $data['nome'] );
        $objeto->setDescricao( $data['descricao'] );
        $objeto->setOrdem( $data['ordem'] );
        return $objeto;
    }
}