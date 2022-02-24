<h1>Bienvenue sur SendNews</h1>
<p>Pour recevoir des NewsLetters</p>
<br>
<form action="index.php?page=home" method="post" >
    <ul>
        <li> 
            <label for="email"> E-mail :</label> 
            <input type="text" id="email" name="email"  value="Saisir email" />
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


if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
    $bienvenue = "<p>";
    $bienvenue .= "Bonjour ";
    $bienvenue .= $_SESSION['prenom'];
    $bienvenue .= " ";
    $bienvenue .= $_SESSION['nom'];
    $bienvenue .= "</p>";
    echo $bienvenue;
}
