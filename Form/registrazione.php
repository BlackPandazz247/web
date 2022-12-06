<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="tableStyle.css">
</head>

<body>
    <div class="body">
        <table id="tabella">
            <tr>
                <td>Cognome</td>
                <td><?php echo $_POST['cognome'] ?></td>
            </tr>
            <tr>
                <td>Nome</td>
                <td><?php echo $_POST['nome'] ?></td>
            </tr>
            <tr>
                <td>Matricola</td>
                <td><?php echo $_POST['matricola'] ?></td>
            </tr>
            <tr>
                <td>Regione di residenza</td>
                <td><?php echo $_POST['regione'] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $_POST['email'] ?></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><?php echo $_POST['telefono'] ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $_POST['username'] ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?php echo $_POST['password'] ?></td>
            </tr>
            <tr>
                <td>Password Hash</td>
                <td><?php echo hash("SHA256", $_POST['password']) ?></td>
            </tr>
        </table>

        <form action="index.html">
            <input type="submit" value="Torna indietro" id="pulsante">
        </form>
    </div>
</body>

</html>