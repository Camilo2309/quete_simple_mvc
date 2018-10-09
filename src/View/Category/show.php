<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple MVC</title>

    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="icon" href="/assets/images/favicon.png">
</head>
<body>
<main>
    <h1>Category <?= $category['name'] ?></h1>
    <ul>
        <li>Id : <?= $category['id'] ?></li>
    </ul>
    <a href='/categories'>Back to list</a>
</main>
</body>
</html>