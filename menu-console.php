<?php

if($argv[1] == "list"){
    echo PHP_EOL;
    echo PHP_EOL;
    echo(" ------------ LIST COMMAND LINE");
    echo PHP_EOL;
    echo PHP_EOL;
    echo("- php menu-console.php list   :   Return all command line available");
    echo PHP_EOL;
    echo PHP_EOL;
    echo("- php menu-console.php help   :   Return all methods available for this ORM");
    echo PHP_EOL;
    echo PHP_EOL;
}else if($argv[1] == "help"){
    echo PHP_EOL;
    echo PHP_EOL;
    echo("___________________________ METHOD LIST ___________________________");
    echo PHP_EOL;
    echo PHP_EOL;
    echo PHP_EOL;
    echo("-------------- CRUD ");
    echo PHP_EOL;
    echo PHP_EOL;
    echo("- save(name,contenu)  :  logs -> Message only  :  Before use save method, you must set the parameters you will use !");
    echo PHP_EOL;
    echo("- create(name,contenu)  :  logs -> Message only");
    echo PHP_EOL;
    echo("- remove(id)  :  logs -> Message only");
    echo PHP_EOL;
    echo("- update(columnToChange, newValue, whereColumn, whereValue)  :  logs -> Message only");
    echo PHP_EOL;
    echo PHP_EOL;
    echo("-------------- SELECTION ");
    echo PHP_EOL;
    echo PHP_EOL;
    echo("- getAll()  :  logs -> Message / Error");
    echo PHP_EOL;
    echo("- getById(id)  :  logs -> Message / Error");
    echo PHP_EOL;
    echo("- getByName(name)  :  logs -> Message / Error");
    echo PHP_EOL;
    echo("- getWhere(paramWhere)  :  logs -> Message / Error");
    echo PHP_EOL;
    echo("- orderByKeyword(keyword)  :  logs -> Message / Error");
    echo PHP_EOL;
    echo("- getByJoin(columnToJoin, paramToJoin)  :  logs -> Message / Error");
    echo PHP_EOL;
    echo PHP_EOL;
    echo("-------------- ANNEXE ");
    echo PHP_EOL;
    echo PHP_EOL;
    echo("- countAll()  :  logs -> Message / Error");
    echo PHP_EOL;
    echo("- countBy(column)  :  logs -> Message / Error");
    echo PHP_EOL;
    echo("- countWhere(column, paramWhere)  :  logs -> Message / Error");
    echo PHP_EOL;
    echo("- in(column, inValue)  :  logs -> Message / Error");
    echo PHP_EOL;
    echo PHP_EOL;
}else{
    echo("Your command line dosnt exist ... use to start : php menu-console.php list ");
}