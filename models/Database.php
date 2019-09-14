<?php


class Database
{
    private $dsn;
    private $username;
    private $password;

    public static function getDB() {
        $driver = 'mysql';
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'forum';
        $charset = 'utf8';
        $dsn = $driver.':host='.$host.';dbname='.$database.';charset='.$charset;
        try {
            $conn = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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