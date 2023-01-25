<?php
session_start();

if (!isset($_POST['submit'])) {
    die("Non puoi accedere direttamente a questa pagina, prima compila il form 
    <a href=./index.html>qui</a>");
}

if ($_POST['captcha'] != $_SESSION['captcha']) {
    die("Il captcha non corrisponde, <a href=javascript:history.go(-1)>riprova</a>");
}

$connection = mysqli_connect('localhost', 'root', '', 'my_utenti') or die("Errore di connessione");

if ($_POST['password'] == $_POST['conferma_password']) {
    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $utente = $_POST['user'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $citta = $_POST['citta'];
    $provincia = $_POST['provincia'];
    $password = $_POST['password'];

    $query = "SELECT * FROM utenti WHERE utente = '$utente';";
    $ris = mysqli_query($connection, $query);
    if (mysqli_num_rows($ris)) {
        echo "<BR><BR><CENTER><FONT face=verdana color=red><H3>Nome utente esistente!</H3>";
        echo "<a href=javascript:history.go(-1)>Torna indietro</a>";
    } elseif (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM utenti WHERE email = '$email'"))) {
        echo "<BR><BR><CENTER><FONT face=verdana color=red><H3>Email esistente!</H3>";
        echo "<a href=javascript:history.go(-1)>Torna indietro</a>";
    } elseif (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM utenti WHERE telefono = '$telefono'"))) {
        echo "<BR><BR><CENTER><FONT face=verdana color=red><H3>Numero di telefono esistente!</H3>";
        echo "<a href=javascript:history.go(-1)>Torna indietro</a>";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO utenti (utente, cognome, nome, email, telefono, citta, provincia, user_password)
            VALUES  ('$utente', '$cognome', '$nome', '$email', '$telefono', '$citta', '$provincia', '$hash');";

        $ris = mysqli_query($connection, $query);

        if ($ris) {
            echo "<BR><BR><CENTER><FONT face=verdana color=green><H3>Registrazione eseguita</H3>";
            echo "<a href=.\index.html>Torna al login</a>";
        } else {
            echo "<BR><BR><CENTER><FONT face=verdana color=red><H3>Errore</H3>";
            echo "<a href=javascript:history.go(-1)>Torna indietro</a>";
        }
    }
} else {
    die("Le due password non corrispondono, <a href=javascript:history.go(-1)>riprova</a>");
}
mysqli_close($connection);
