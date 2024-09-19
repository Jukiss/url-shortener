<?php
require './UrlShortener.php';
$shortener = new UrlShortener();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>URL shortener</title>
</head>
<body>
    <h1>URL shortener</h1>
    <form method="POST">
        <input type="text" name="url" placeholder="put long URL" required>
        <button type="submit" name="send" >short URL </button>
    </form>

    <?php 
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {//чтобы при обновлении страницы, не генерилась новая ссылка+ защита от долбоеба нужна
        $shortUrlId = $shortener->shorten($_POST['url']);
        $shortUrl = "http://localhost/" . $shortUrlId;
    }
    //unset($_POST);
    if (isset($shortUrl)): ?>
        <p>short link: <a href="<?= $shortUrl ?>"><?= $shortUrl ?></a></p>
    <?php endif; ?>
</body>
</html>
