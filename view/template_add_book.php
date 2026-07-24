<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Ajouter un livre</title>
</head>
<body>
    <main class="container-fluid">
        <h1>Ajouter un livre</h1>
        <form action="" method="post">
            <fieldset>
                <label for="title">Saisir le titre du livre</label>
                <input type="text" name="title">
                <label for="summary">Saisir le résumé</label>
                <textarea name="summary"></textarea>
                <label for="author">Saisir le nom de l'auteur</label>
                <input type="text" name="author">
                <label for="published_at">Saisir la date de publication</label>
                <input type="date" name="published_at">
                <select name="category_id">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category["id"] ?>"><?= $category["category_name"] ?></option>
                    <?php endforeach ?>
                </select>
                <input type="submit" value="Ajouter" name="submit">
            </fieldset>
        </form>
        <p><?= $message ?? "" ?></p>
    </main>
</body>
</html>