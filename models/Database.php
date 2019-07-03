<?php


class Database
{
    private $dsn;
    private $username;
    private $password;

    public static function getBanco() {
        $dsn = 'mysql:host=localhost;dbname=forum';
        $username = 'root';
        $password = '';
        try {
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //print "Conectado com sucesso";
            return $conn;
        }
        catch (PDOException $e) {
            print 'Erro ao conectar ao banco: '.$e->getMessage();
            //return 0;
        }
    }
}