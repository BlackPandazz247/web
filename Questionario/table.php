<?php
session_start();

if (!isset($_POST['submit'])) {
    exit("Non puoi accedere direttamente a questa pagina, prima compila il form 
    <a href=\"index.html\">qui</a>");
}

if ($_POST['captcha'] != $_SESSION['captcha']) {
    exit("Il captcha non corrisponde, <a href=\"index.html\">riprova</a>");
}
?>

<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dati inseriti</title>
    <link rel="stylesheet" href="tableStyle.css">
</head>

<body>
    <div class="body">
        <table id="tabella">
            <tr>
                <td>Nome</td>
                <td><?php echo $_POST['nome'] ?></td>
            </tr>
            <tr>
                <td>Cognome</td>
                <td><?php echo $_POST['cognome'] ?></td>
            </tr>
            <tr>
                <td>Età</td>
                <td><?php echo $_POST['eta'] ?></td>
            </tr>
            <tr>
                <td>Provincia</td>
                <td><?php echo $_POST['provincia'] ?></td>
            </tr>
            <tr>
                <td>Comune</td>
                <td><?php echo $_POST['comune'] ?></td>
            </tr>
            <tr>
                <td>Scuola frequentata</td>
                <td><?php echo $_POST['scuola'] ?></td>
            </tr>
            <tr>
                <td>Come sei venuto a conoscenza</td>
                <td>
                    <?php
                    if ($_POST['conoscenza'] == "altro") {
                        echo $_POST['conoscenza'], " (", $_POST['specifica'], ")";
                    } else {
                        echo $_POST['conoscenza'];
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Indirizzo</td>
                <td><?php echo $_POST['specializzazione'] ?></td>
            </tr>
        </table>

        <form action="index.html">
            <input type="submit" value="Torna indietro" id="pulsante">
        </form>
    </div>
</body>

</html>