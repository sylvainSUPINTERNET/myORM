<?php

abstract class actions
{

//CRUD
    public abstract function save($pdo, $id, $name, $contenu);
    public abstract function create($pdo, $id, $name, $contenu);
    public abstract function remove($pdo, $id);
    public abstract function update($pdo,$columnToChange,$newValue, $whereColum, $whereValue);


//SELECTION
    public abstract function getAll($pdo);
    public abstract function getById($pdo, $id);
    public abstract function getByName($pdo, $name);
    public abstract function getWhere($pdo, $paramWhere);
    public abstract function orderByKeyword($pdo,$keyword);
    public abstract function getByJoin($pdo,$columToJoin,$paramToJoin);

//Fonctions annexes
    #COUNT
    public abstract function countAll($pdo);
    public abstract function countBy($pdo,$column);
    public abstract function countWhere($pdo,$column,$paramWhere);

    #IN
    public abstract function in($pdo,$paramWhere,$inValue);


}


