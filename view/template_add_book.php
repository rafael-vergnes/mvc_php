<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="../assets/style/main.css">
    <title>Ajouter un livre</title>
</head>

<body>
    <?php include 'components/navbar.php'; ?>
    <?= $_SESSION["prenom"] ?? "" ?>
    <main class="container-fluid">
        <h1>Ajouter un livre</h1>
        <form action="" method="post">
            <p><?= htmlspecialchars($message ?? "") ?></p>
            <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
            <fieldset>
                <label>Saisir le titre du livre<input type="text" name="title"></label>
                <label>Saisir le résumé<textarea name="summary"></textarea></label>
                <label>Saisir le nom de l'auteur<input type="text" name="author"></label>
                <label>Saisir la date de publication<input type="date" name="published_at"></label>
                <select name="category_id" aria-label="Sélectionner une catégorie" required >
                    <option selected disabled value="">
                        Sélectionner une catégorie...
                    </option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category["id"] ?>"><?= $category["category_name"] ?></option>
                    <?php endforeach ?>
                </select>
                <input type="submit" value="Ajouter" name="submit">
            </fieldset>
        </form>
    </main>
</body>

</html>