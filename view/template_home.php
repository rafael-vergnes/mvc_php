<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
        <link rel="stylesheet" href="../assets/style/main.css">
    <title>Accueil</title>
</head>
<body>
    <?php include 'components/navbar.php'; ?>
    <main>
        <h1>Bienvenue sur notre super site en MVC</h1>
        <h2>Bonjour <?= $nom ?? ""?></h2>
        <form action="" method="post">
            <input type="text" name="prenom">
            <input type="submit" value="envoyer" name="submit">
        </form>
        <h2>Vous vous appelez : <?= $prenom ?? "" ?></h2>
    </main>
</body>
</html>