<?php
require './UrlShortener.php';

$shortener = new UrlShortener();
$id = $_GET['id'] ?? '';

if ($id) {
    $url = $shortener->getUrl($id);
    if ($url) {
        header("Location: $url");
        exit();
    } else {
        echo "Link not found.";
    }
} else {
    echo "Invalid request.";
}
