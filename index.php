<?php

// Entities
require_once 'Entity/Articles.php';

$article = new Articles(); // Entity of test






/* QUICK START => Disable: # on the request and var_dump to test. */

//======================================================================
//                          CRUD METHOD
//======================================================================

//-----------------------------------------------------
// REMOVE(id) ---> logs (Message : yes / Error: NA)

        # $article->remove('788');
//-----------------------------------------------------


//-----------------------------------------------------
// SAVE(name,content) with use SET() ---> logs (Message : yes / Error: NA)

         # $name = $article->setName("JolyTest");
         # $contenu = $article->setContenu("My content for the test !");
         # $article->save($name,$contenu);
//-----------------------------------------------------



//-----------------------------------------------------
// CREATE(name,content) without SET() ---> logs (Message : yes / Error: NA)

         # $test = $article->create("LEEEEEE","300zaeazeaz 1000");
         # var_dump($test);
//-----------------------------------------------------



//-----------------------------------------------------
// UPDATE(columnToChange, newValue, whereColum, whereValue) ---> logs (Message : yes / Error: NA)

        # $test = $article->update('id', '480', 'id', '1');
        # var_dump($test);
//-----------------------------------------------------



//======================================================================
//                          SELECTION METHOD
//======================================================================

//-----------------------------------------------------
// GET_ALL() ---> logs (Message : yes / Error: yes)

        # $test = $article->getAll();
        # var_dump($test);
//-----------------------------------------------------


//-----------------------------------------------------
// GET_BY_ID(id) ---> logs (Message : yes / Error: yes)

         # $test = $article->getById('300');
         # var_dump($test);
//-----------------------------------------------------


//-----------------------------------------------------
// GET_BY_NAME(name) ---> logs (Message : yes / Error: yes)

         # $test = $article->getByName('GERARD');
         # var_dump($test);
//-----------------------------------------------------


//-----------------------------------------------------
// GET_WHERE(paramWhere) ---> logs (Message : yes / Error: yes)

        # $test = $article->getWhere('id = 300');
        # var_dump($test);
//-----------------------------------------------------


//-----------------------------------------------------
// ORDER_BY_KEYWORD(keyword) ---> logs (Message : yes / Error: yes)

        # $test = $article->orderByKeyword('id');
        # var_dump($test);
//-----------------------------------------------------


//-----------------------------------------------------
// GET_BY_JOIN(columnToJoin, paramToJoin) ---> logs (Message : yes / Error: yes)

        # $test = $article->getByJoin('news', 'title');
        # var_dump($test);
//-----------------------------------------------------



//======================================================================
//                          ANNEXE METHOD
//======================================================================

//-----------------------------------------------------
// COUNT_ALL() ---> logs (Message : yes / Error: yes)

        # $test = $article->countAll();
        # var_dump($test);
//-----------------------------------------------------


//-----------------------------------------------------
// COUNT_BY(column) ---> logs (Message : yes / Error: yes)

        # $test = $article->countBy('name');
        # var_dump($test);
//-----------------------------------------------------


//-----------------------------------------------------
// COUNT_WHERE(column, paramWhere) ---> logs (Message : yes / Error: yes)

        # $test = $article->countWhere('id', 'id < 10');
        # var_dump($test);
//-----------------------------------------------------


//-----------------------------------------------------
// INT(column, searchValue) ---> logs (Message : yes / Error: yes)

        # $test = $article->in('id', '4');
        # var_dump($test);
//-----------------------------------------------------

