<?php if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
    $bienvenue = "<p>";
    $bienvenue .= "Bonjour ";
    $bienvenue .= $_SESSION['prenom'];
    $bienvenue .= " ";
    $bienvenue .= $_SESSION['nom'];
    $bienvenue .= "</p>";
    echo $bienvenue;
}
else {

?>

<h1>Bienvenue sur SendNews</h1>
<p>Pour recevoir des NewsLetters</p>
<br>
<form action="index.php?page=home" method="post" >
    <ul>
        <li> 
            <label for="email"> E-mail :</label> 
            <input type="text" id="email" name="email" />
        </li>
        <li>
            <input type="reset" value="Effacer" />
        </li>
        <li>
            <input type="submit" value="Confirmer" name="confirmer" />
        </li>
    </ul>
</form>

<?php

    if (isset($_POST['confirmer'])) {
        $email = $_POST['email'] ?? '';
        $erreur = array();



        if (count($erreur) === 0) {
            $serverName = "localhost";
            $userName = "root";
            $database = "sendnews";
            $userPassword = "";

            try {
                $conn = new PDO("mysql:host=$serverName;dbname=$database", $userName, $userPassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
                $requete = $conn->prepare("SELECT * FROM t_users WHERE USERMAIL='$email'");
                $requete->execute();
                $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
            
                if(count($resultat) !== 0) {
                    echo "<p>Votre adresse est déjà enregistrée dans la base de données</p>";
                }

                else {
                    $query = $conn->prepare("
                    INSERT INTO t_users(ID_ROLE, USERMAIL)
                    VALUES (:id_role, :usermail)
                    ");

                    $id = 1;
                    $query->bindParam(':id_role', $id);
                    $query->bindParam(':usermail', $email, PDO::PARAM_STR_CHAR);
                    $query->execute();
                    
                    echo "<p>Votre adresss E-mail à été envoyé</p>";
                }
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
    } else {
        echo "<h2>Merci de renseigner le formulaire&nbsp;:</h2>";
        $name  = $email = '';
    }

}


