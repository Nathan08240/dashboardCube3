<?php
//connect to database with PDO and try to catch any errors

try {
    $db = new PDO('mysql:host=localhost;dbname=badgeuse', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>