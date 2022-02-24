<?php

function getSubject() : array
{
        $serverName = "localhost";
        $userName = "root";
        $database = "sendnews";
        $userPassword = "";
        
        $conn = new PDO("mysql:host=$serverName;dbname=$database", $userName, $userPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $requete = $conn->prepare("SELECT * FROM t_subjects");
        $requete -> execute();
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
    
        $array = array ($resultat);
        return $array;
}