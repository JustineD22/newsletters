<?php 
if (isset($_SESSION['login']) && ($_SESSION['role'] >=2 )){
    echo ("Vous pouvez modifier vos Abonnements.");

 ?>

    <h1>Mes Abonnements</h1>
    <br>
    <h2>Mes Sujets préférés :</h2>
    <br>

    <?php
    //var_dump($_POST);

    $test = getSubjects();
    $recup = getIDsubjects();
    for ($i=0; $i <count($recup) ; $i++) { 
    }
        //dump($test);

        $html = "<form action='index.php?page=abonnement' method='post'>";
        $html .= "<ul>";
        for ($i = 0; $i < count($test); $i++){
            $idsubject = implode(" ", $recup[$i]);
            $string = implode(" ", $test[$i]);
            $html .= "<li>";
            $html .= "<label for=\"abonnement\">" . "$string";
            $html .= "</label>";
            $html .= "<input type= \"checkbox\" \" value=\"$string\" name=\"$idsubject\">";
            $html .= "</li>";

        }
    $html .= "<li>";
    $html .= "<input type=\"submit\" value=\"Valider\" name=\"valider\" />";
    $html .= "</li>";
    $html .= "</ul>";
    $html .= "</form>";

    echo($html);

    if (isset($_POST['valider'])) {
        $erreur = array();

        if (count($_POST) === 1)
        array_push($erreur, "Veuillez cocher un sujet");

        if (count($erreur) === 0) {
            $serverName = "localhost";
            $userName = "root";
            $database = "sendnews";
            $userPassword = "";

            try {
                $id = $_SESSION['id'];
                //var_dump($id);
                $conn = new PDO("mysql:host=$serverName;dbname=$database", $userName, $userPassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $conn->prepare("INSERT INTO t_users_has_t_subjects(ID_USER, ID_SUBJECT) VALUES (:id_user, :id_subject)");
                $query->bindParam(':id_user', $id, PDO::PARAM_STR_CHAR);
                $query->bindParam(':id_subject', $idsubject, PDO::PARAM_STR_CHAR);

                foreach ($_POST as $key => $value) {
                    if ($key !== 'valider') {
                        $idsubject = $key;
                        $query->execute();
                    }
                
                }
                
            
                
                        
                echo "Changement accépté ";

            } catch (PDOException $e) {
                die("Erreur :  " . $e->getMessage());
            }

            $conn = null;
        } else {
            $messageErreur = "<ul>";
            $i = 0;
            do {
                $messageErreur .= "<li>" . $erreur[$i] . "</li>";
                $i++;
            } while ($i < count($erreur));

            $messageErreur .= "</ul>";

            echo $messageErreur;
        }
    } 
}
else {
    echo("Vous devez vous inscrire ou vos connecter pour modifier vos abonements");
}