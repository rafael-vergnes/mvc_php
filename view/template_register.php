<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>S'inscrire</title>
</head>

<body>    
    <?php include 'components/navbar.php'; ?>
    <main class="container-fluid">
        <h1>Créer un compte</h1>
        <form action="" method="post">
            <fieldset>
                <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                <label>Saisir le prénom <input type="text" name="firstname"></label>
                <label>Saisir le nom <input type="text" name="lastname"></label>
                <label>Saisir le mail <input type="email" name="email"></label>
                <label>Saisir le mot de passe<input type="password" name="password"></label>
                <label>Confirmer le mot de passe <input type="password" name="confirm-password"></label>
            </fieldset>
            <input type="submit" value="enregistrer" name="submit">
        </form>
        <p><?= $message ?? "" ?></p>
    </main>
</body>

</html>