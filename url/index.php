<?php
require './UrlShortener.php';
$shortener = new UrlShortener();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>URL shortener</title>
</head>
<body>
<div class="container">
    <h1>URL shortener</h1>
    <div class="form-background">
    <form method="POST">
        <input type="text" name="url" placeholder="put your long URL here" required>
        <button type="submit" name="send" >short URL </button>
    </form>
    </div>
    <?php 
   
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {//чтобы при обновлении страницы, не генерилась новая ссылка+ защита от долбоеба нужна
       $shortUrlId = $shortener->shorten($_POST['url']);
       $shortUrl = "http://localhost/" . $shortUrlId;
       //
       //
   }
   //unset($_POST);
   $_POST['url']='';
   //header('Location: /url/');
   if (isset($shortUrl)): ?>
       <div class="shortlink">
           <p>short link: <a href="<?= $shortUrl ?>"><?= $shortUrl ?></a></p>
           </div>
   <?php endif; ?>
</div>

</body>
</html>
