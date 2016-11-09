<?php

interface Where
{
    public function getWhere($pdo, $paramWhere);
    public function setWhere($pdo, $paramWhere); // revoir les param
}

