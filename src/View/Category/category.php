<!DOCTYPE html>
<html>
<head>
    <title>MVC 2</title>
</head>
<body>
    <section>
        <h1>Items</h1>
        <ul>
            <?php foreach ($items as $item) : ?>
                <li><?= $item['title'] ?></li>
            <?php endforeach ?>
        </ul>
    </section>
    <main>
        <h1>Item <?= $item['title'] ?></h1>
            <ul>
                <li>Id : <?= $item['id'] ?></li>
            </ul>
        <a href='index.php?route=items'>Back to list</a>
    </main>

</body>
</html>