# ORM - Joly Sylvain (2eme année - Dev)

Bienvenue sur mon ORM :)

#Informations générales
- Support uniquement mySQL
- connection avec PDO
- Ligne de commande sous WINDOW uniquement sinon à adapter (retirer php au début de la ligne simplement sur votre terminal)

#Starter pack 
- Import la base articles.sql sur votre phpMyAdmin mise à votre disposition à la racine du project sous le nom de articles.sql

Elle comporte les tables : articles et news

    -> nom de la base de donnée : orm (utiliser ce nom pour la connection)
		
    -> Table article pour toutes les requêtes 
		
    -> Table news uniquement pour le test de la requête en rapport avec la jointure getByJoin().

- Ajouter vos identifiants pour vous connecter à la base (utilise PDO)



```html
		-> Aller dans /config/PDOManager.php
 
 		-> Rentrer vos identifiants : $host,$user,$password
				
		-> (Pour $host : le nom de la base est orm dû à l'import de articles.sql !)
```		
#Quick start 
Une fois que tout est installé, vous devriez avoir un rendu de index.php ('/') vide, auquel la classe article est déjà instanciée.

Vous n'avez plus qu'à décommenté les requêtes que vous souhaitez tester (dans l'index.php). 

				Le code à décommenté est devancée par un " # "
				
De plus chaque requête dispose de ses informations supplémentaires concernant leur utilisation:

paramètres / gestion de logs (activer ou non)

**Gestions des logs**

		-> /logManagement/logManangement.php (body définit dans Entity/Article.php)

**Gestion des requêtes**

		-> /actionManangement/actionManangement.php (body définit dans la class articles /Entity/Article.php
				
#Ligne de command 


	Ouvrez votre terminal à la racine du project 
	
 **Executer les commandes suivantes** (Window only sinon adapter)
 
		php menu-console.php list ===> Donne la liste des lignes de commandes disponibles
		php menu-console.php help ===> Donne la liste de toutes les requêtes de l'entité Article, et leurs spécificitées
		php menu-console.php crud create ===> Créer un nouvelle article (id auto / name / contenu)
		php menu-console.php crud remove ===> Supprime un article


