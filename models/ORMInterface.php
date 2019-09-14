<?php


interface ORMInterface
{
    public static function getDB();
    public function insert();
    public function update();
    public function delete();
    public static function findById($id);
    public static function findAll();
}