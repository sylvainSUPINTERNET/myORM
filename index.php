<?php

require_once 'Entity/Articles.php'; // Entity




$article = new Articles();
$test = $article->getByJoin('news','title');
var_dump($test);







//$test = $article->getAll($pdo);


/*$ttest = $article->orderByKeyword($pdo, "noez");
var_dump($ttest);*/



/*
 * CRUD test
//save
$id = $article->setId(500);
$name = $article->setName("salut");
$contenu = $article->setContenu("Mon contenu lol");
$article->save($pdo,$id,$name,$contenu);


// create
$test = $article->update($pdo,"name","GERARD","id",7);
var_dump($test);

*/


/*
 * FUNCTION ANNEXE test
//COUNT
$lol2 = $article->countAll($pdo);
var_dump($lol2);


$lol = $article->countBy($pdo,"name");
var_dump($lol);


$test = $article->countWhere($pdo,"name","name = 'JEAN' ");
var_dump($test);


$test2 = $article->countWhere($pdo,"name","id > 7 ");
var_dump($test2);


//IN
$salut = $article->in($pdo,"name","jean");
var_dump($salut);

$salut2 = $article->in($pdo,"ezaeaeae","eazeaeaea");
var_dump($salut2);
*/







/* Test logOK / logFALSE
$article = new Articles();
$article->getByName($pdo,"JEAN");
$article = new Articles();
$article->getByName($pdo,"AEZAEAZE");
*/




