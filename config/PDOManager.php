<?php


class PDOManager {

    private $host = ''; // mysql:host=127.0.0.1;dbname=NameBase
    private $user = ''; // root
    private $password = ''; // ''


    public function bdd(){
        $host = $this->getHost();
        $user = $this->getUser();
        $password = $this->getPassword();

        $pdo = new PDO($host,$user,$password);

        return $pdo;
    }

    public function getHost(){
        return $this->host;
    }

    public function getUser(){
        return $this->user;
    }

    public function getPassword(){
        return $this->password;
    }


}

