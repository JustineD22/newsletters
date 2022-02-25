<?php

function getSubjects() 
{
        $serverName = "localhost";
        $userName = "root";
        $database = "sendnews";
        $userPassword = "";
        
        $conn = new PDO("mysql:host=$serverName;dbname=$database", $userName, $userPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $conn->prepare("SELECT SUBCONTENT FROM t_subjects ORDER BY SUBCONTENT ASC");
        $requete -> execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC); 

        foreach ($resultat as $key => $value) {
        }
        return $resultat;
}