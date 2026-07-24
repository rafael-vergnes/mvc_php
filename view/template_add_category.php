<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Ajouter une categorie</title>
</head>
<body>
    <main class="container-fluid">
        <h1>Ajouter une categorie</h1>
        <form action="" method="post">
            <fieldset>
                <label for="category_name">Saisir le nom de la categorie</label>
                <input type="text" name="category_name">
                <input type="submit" value="ajouter" name="submit">
            </fieldset>
        </form>
        <p><?= $message ?? "" ?></p>
    </main>
</body>
</html>