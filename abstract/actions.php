<?php


abstract class actions
{

//CRUD
    public abstract function save($id, $name, $contenu);

    public abstract function create($id, $name, $contenu);

    public abstract function remove($id);

    public abstract function update($columnToChange, $newValue, $whereColum, $whereValue);


//SELECTION
    public abstract function getAll();

    public abstract function getById($id);

    public abstract function getByName($name);

    public abstract function getWhere($paramWhere);

    public abstract function orderByKeyword($keyword);

    public abstract function getByJoin($columToJoin, $paramToJoin);

//Fonctions annexes
    #COUNT
    public abstract function countAll();

    public abstract function countBy($column);

    public abstract function countWhere($column, $paramWhere);

    #IN
    public abstract function in($paramWhere, $inValue);


}


