<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        if (urldecode($_SERVER['REQUEST_URI']) == '/views/admin.php' || urldecode($_SERVER['REQUEST_URI']) == '/views/dashboard.php') {
            echo '<link href="../dist/output.css" rel="stylesheet">';
        }
        else {
            echo '<link href="/dist/output.css" rel="stylesheet">';
        }
    ?>
    <link rel="icon" type="image/png" href="./../assets/img/cedi_logo_bgremove.png">
    <link href='/node_modules/fullcalendar/main.css' rel='stylesheet' />
</head>