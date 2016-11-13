<?php
require_once 'Entity/Articles.php';

require_once './config/PDOManager.php';

require_once './logManagement/logManagement.php';

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
    echo("- php menu-console.php crud create   :   create an Article (name / content)");
    echo PHP_EOL;
    echo PHP_EOL;
    echo("- php menu-console.php crud remove   :   remove an Article (id)");
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
}else if($argv[1] == "crud" && $argv[2] == "create" ){

    // log for console
     function logMessage($stmt, $timeRequest)
    {
        $date = new DateTime();
        $dateString = $date->format('Y-m-d H:i:s');
        $fp = fopen("./request.log", "a+");
        fputs($fp, "REQUEST_ARG =>" . $stmt->queryString . " DATE_HOUR =>[" . $dateString . "]" . " EXECUTION_TIME =>" . $timeRequest . " ms" . PHP_EOL);
        fclose($fp);
    }

     function logError($stmt, $timeRequest, $errorMessage)
    {
        $date = new DateTime();
        $dateString = $date->format('Y-m-d H:i:s');
        $fp = fopen("./error.log", "a+");
        fputs($fp, "REQUEST_ARG =>" . $stmt->queryString . " DATE_HOUR =>[" . $dateString . "]" . " EXECUTION_TIME =>" . $timeRequest . " ms" . " ERROR_MESSAGE => " . $errorMessage . PHP_EOL);
        fclose($fp);
    }

    //bdd PDO connection for console
   function getBdd()
    {
        $pdo = new PDOManager();
        $pdo = $pdo->bdd();

        return $pdo;
    }

    echo ("Create article");
    echo PHP_EOL;
    echo ("Name : ");
    $entryName = fgets(STDIN);
    echo PHP_EOL;
    echo ("Contenu : ");
    $entryContent = fgets(STDIN);

    $name = $entryName;
    $content = $entryContent;

    $timestamp_debut = microtime(true);
    $getLastId = getBdd()->query('SELECT MAX(id) FROM `articles`');
    $idFind = $getLastId->fetch();
    $idStringTmp = $idFind[0];
    $idInt = intval($idStringTmp+1); //auto id
    $idString = strval($idInt);

    $stmt = getBdd()->prepare("INSERT INTO `articles`(`id`, `name`, `contenu`) VALUES (:id, :name, :contenu)");
    $stmt->bindValue(':id',$idString);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':contenu', $content);
    $stmt->execute();


    $timestamp_fin = microtime(true);
    $difference_ms = $timestamp_fin - $timestamp_debut;
    logMessage($stmt, $difference_ms);
    echo("Nouvelle article crée ! (LOG MESSAGE AUTO-CREATE");


}else if($argv[1] == "crud" && $argv[2] == "remove"){
    // log for console
    function logMessage($stmt, $timeRequest)
    {
        $date = new DateTime();
        $dateString = $date->format('Y-m-d H:i:s');
        $fp = fopen("./request.log", "a+");
        fputs($fp, "REQUEST_ARG =>" . $stmt->queryString . " DATE_HOUR =>[" . $dateString . "]" . " EXECUTION_TIME =>" . $timeRequest . " ms" . PHP_EOL);
        fclose($fp);
    }

    function logError($stmt, $timeRequest, $errorMessage)
    {
        $date = new DateTime();
        $dateString = $date->format('Y-m-d H:i:s');
        $fp = fopen("./error.log", "a+");
        fputs($fp, "REQUEST_ARG =>" . $stmt->queryString . " DATE_HOUR =>[" . $dateString . "]" . " EXECUTION_TIME =>" . $timeRequest . " ms" . " ERROR_MESSAGE => " . $errorMessage . PHP_EOL);
        fclose($fp);
    }

    //bdd PDO connection for console
    function getBdd()
    {
        $pdo = new PDOManager();
        $pdo = $pdo->bdd();

        return $pdo;
    }

    echo ("Remove article");
    echo PHP_EOL;
    echo ("id : ");
    $entryId = fgets(STDIN);
    echo PHP_EOL;

    $id = $entryId;

    $timestamp_debut = microtime(true);

    $stmt = getBdd()->prepare("DELETE FROM `articles` WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $timestamp_fin = microtime(true);
    $difference_ms = $timestamp_fin - $timestamp_debut;
    logMessage($stmt, $difference_ms);
    echo("Article delete (LOG MESSAGE AUTO-CREATE)");
}else{
    echo("Your command line dosnt exist ... use to start : php menu-console.php list ");
}