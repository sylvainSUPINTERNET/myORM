<?php
// connection
require_once './config/PDOManager.php';


//function +
require_once './abstract/actions.php';

//logs management
require_once './interfaces/logManagement.php';


//CAN ADD YOUR DEPENDENCIES IF ITS REQUIRED


class Articles extends actions implements logManagement
{

    protected $id;
    protected $name;
    protected $contenu;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    private function getBdd()
    { //security with private
        $pdo = new PDOManager();
        $pdo = $pdo->bdd();
        return $pdo;
    }

    //LOG
    public function logMessage($stmt, $timeRequest)
    {
        $date = new DateTime();
        $dateString = $date->format('Y-m-d H:i:s');
        $fp = fopen("./request.log", "a+"); //utiliser a+ creer le fichier si il existe pas
        fputs($fp, "REQUEST_ARG =>" . $stmt->queryString . " DATE_HOUR =>[" . $dateString . "]" . " EXECUTION_TIME =>" . $timeRequest . " ms" . PHP_EOL);
        fclose($fp);
    }

    public function logError($stmt, $timeRequest, $errorMessage)
    {
        $date = new DateTime();
        $dateString = $date->format('Y-m-d H:i:s');
        $fp = fopen("./error.log", "a+"); //utiliser a+ creer le fichier si il existe pas
        fputs($fp, "REQUEST_ARG =>" . $stmt->queryString . " DATE_HOUR =>[" . $dateString . "]" . " EXECUTION_TIME =>" . $timeRequest . " ms" . " ERROR_MESSAGE => " . $errorMessage . PHP_EOL);
        fclose($fp);
    }

    // CRUD
    public function save($id, $name, $contenu) // utiliser setter getter sinon save marche pas
    {
        $timestamp_debut = microtime(true);

        $stmt = $this->getBdd()->prepare("INSERT INTO `articles`(`id`, `name`, `contenu`) VALUES (:id, :name, :contenu)");
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':name', $this->getName());
        $stmt->bindValue(':contenu', $this->getContenu());
        $stmt->execute();

        $timestamp_fin = microtime(true);
        $difference_ms = $timestamp_fin - $timestamp_debut;
        $this->logMessage($stmt, $difference_ms);
        return "Nouvelle Articles sauvegarder !";

    }

    public function create($id, $name, $contenu) // create directement pas besoin de set les valeur au préalable
    {
        $timestamp_debut = microtime(true);

        $stmt = $this->getBdd()->prepare("INSERT INTO `articles`(`id`, `name`, `contenu`) VALUES (:id, :name, :contenu)");
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':contenu', $contenu);
        $stmt->execute();

        $timestamp_fin = microtime(true);
        $difference_ms = $timestamp_fin - $timestamp_debut;
        $this->logMessage($stmt, $difference_ms);
        return "Nouvelle Articles ajouté !";

    }


    public function remove($id)
    {
        $timestamp_debut = microtime(true);

        $stmt = $this->getBdd()->prepare("DELETE FROM `articles` WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $timestamp_fin = microtime(true);
        $difference_ms = $timestamp_fin - $timestamp_debut;
        $this->logMessage($stmt, $difference_ms);
        return "Article id : " . $id . " bien delete !";
    }

    public function update($columnToChange, $newValue, $whereColum, $whereValue)
    {
        $timestamp_debut = microtime(true);

        $param1 = "";
        $param2 = "";
        $param1 = "'" . $newValue . "'";
        $param2 = "'" . $whereValue . "'";
        $stmt = $this->getBdd()->prepare("UPDATE `articles` SET $columnToChange = $param1 WHERE $whereColum = $param2");
        $stmt->execute();

        $timestamp_fin = microtime(true);
        $difference_ms = $timestamp_fin - $timestamp_debut;

        $this->logMessage($stmt, $difference_ms);
        return $stmt;
    }

    public function getAll()  //all
    {
        $timestamp_debut = microtime(true);


        $stmt = $this->getBdd()->prepare("SELECT * FROM articles");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_OBJ);

        $timestamp_fin = microtime(true);
        $difference_ms = $timestamp_fin - $timestamp_debut;
        $this->logMessage($stmt, $difference_ms);
        return $response;
    }

    public function getById($id)  //byId
    {
        $timestamp_debut = microtime(true);

        $stmt = $this->getBdd()->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_OBJ);

        $timestamp_fin = microtime(true);
        $difference_ms = $timestamp_fin - $timestamp_debut;
        $this->logMessage($stmt, $difference_ms);
        return $response;
    }

    public function getByName($name) //byName
    {
        $timestamp_debut = microtime(true);

        $stmt = $this->getBdd()->prepare("SELECT * FROM articles WHERE name = :name");
        $stmt->bindValue('name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($response)) {
            $errorMessage = " REQUEST DOSNT WORK BECAUSE WRONG PARAMETERS !";
            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $this->logError($stmt, $difference_ms, $errorMessage);
        } else {
            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $this->logMessage($stmt, $difference_ms);

            return $response;
        }
    }

    public function orderByKeyword($keyword)
    {
        $timestamp_debut = microtime(true);
        $stmt = $this->getBdd()->prepare("SELECT * FROM articles ORDER BY '$keyword'");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($response) || $response == null) {
            $timestamp_fin = microtime(true);
            $errorMsg = "REQUEST DOSNT WORK !  CHECK YOUR PARAMETERS COLUMN NAME REQUIRED DECLARED AS STRING WITH : 'foo' ";
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $this->logError($stmt, $difference_ms, $errorMsg);
        }
        $timestamp_fin = microtime(true);
        $difference_ms = $timestamp_fin - $timestamp_debut;
        $this->logMessage($stmt, $difference_ms);

        return $response;

    }

    public function getWhere($paramWhere)
    {
        $timestamp_debut = microtime(true);

        $stmt = $this->getBdd()->prepare("SELECT * FROM `articles` WHERE `name` = '$paramWhere'");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($response)) {
            throw new Exception("La requete n'a pas aboutit, veuillez VERIFIER VOS PARAMETRE");
        }

        $timestamp_fin = microtime(true);
        $difference_ms = $timestamp_fin - $timestamp_debut;
        $this->logMessage($stmt, $difference_ms);
        return $response;
    }

    public function getByJoin($columnToJoin, $paramToJoin)
    {
        $timestamp_debut = microtime(true);

        $stmt = $this->getBdd()->prepare("SELECT * FROM `articles` INNER JOIN $columnToJoin ON articles.$paramToJoin = $columnToJoin.$paramToJoin");
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($response)) {
            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $messageError = " CHECK YOURS PARAMETERS : COLUMN NAME AND CONDITION PARAMETER";
            $this->logError($stmt, $difference_ms, $messageError);
            return $response;
        } else {
            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $this->logMessage($stmt, $difference_ms);
            return $response;
        }

    }


    public function countAll()
    {
        $timestamp_debut = microtime(true);

        $stmt = $this->getBdd()->prepare("SELECT COUNT(*) FROM articles");
        $stmt->execute();
        $nbFind = $stmt->fetch();
        if ($nbFind == null) {
            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $error = " request return null, check your paramters ! ";
            $this->logError($stmt, $difference_ms, $error);
            return $nbFind;
        } else {

            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $this->logMessage($stmt, $difference_ms);
            return $nbFind[0];
        }

    }

    public function countBy($column)
    {
        $timestamp_debut = microtime(true);

        $paramColumn = $column;
        $stmt = $this->getBdd()->prepare("SELECT COUNT($paramColumn) FROM articles");
        $stmt->execute();
        $nbFind = $stmt->fetch();
        if ($nbFind == null) {
            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $error = " request return null, check your paramters ! ";
            $this->logError($stmt, $difference_ms, $error);
            return $nbFind;
        } else {

            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $this->logMessage($stmt, $difference_ms);
            return $nbFind[0];
        }
    }

    public function countWhere($column, $paramWhere)
    {
        $timestamp_debut = microtime(true);

        $paramColumn = $column;
        $where = $paramWhere;

        $stmt = $this->getBdd()->prepare("SELECT COUNT($paramColumn) FROM articles WHERE $where");
        $stmt->execute();
        $nbFind = $stmt->fetch();
        if ($nbFind == null) {
            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $error = " request return null, check your paramters ! ";
            $this->logError($stmt, $difference_ms, $error);
            return $nbFind;
        } else {

            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $this->logMessage($stmt, $difference_ms);
            return $nbFind[0];
        }
    }

    public function in($paramWhere, $inValue)
    {
        $timestamp_debut = microtime(true);

        $where = $paramWhere;
        $value = "'" . $inValue . "'";
        $stmt = $this->getBdd()->prepare("SELECT * FROM articles WHERE $where IN ($value)");
        $stmt->execute();
        $valueFind = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (empty($valueFind)) {
            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $error = " request return is empty, check column name and condition parameters, or the values dosnt exist ! ";
            $this->logError($stmt, $difference_ms, $error);
            return $valueFind;
        } else {
            $timestamp_fin = microtime(true);
            $difference_ms = $timestamp_fin - $timestamp_debut;
            $this->logMessage($stmt, $difference_ms);
            return $valueFind;
        }

    }


}