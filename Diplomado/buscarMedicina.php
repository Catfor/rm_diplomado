<?php
session_start();
setlocale(LC_ALL, 'es_ES.UTF-8');
date_default_timezone_set('America/Mexico_City');
if (isset($_POST['key'])) {
    include('../coni/Localhost.php');

    $html = '';
    $key = $_POST['key'];
    $query = 'SELECT medicamento FROM cat_medicamento  WHERE medicamento LIKE "%' . strip_tags($key) . '%" ORDER BY medicamento DESC LIMIT 0,3';
    $result = $mysqliL->query($query) or die($mysqliL->error);
    
    while ($row = $result->fetch_assoc()) {
            $html .= '<div><a class="suggest-element" data="' . utf8_encode($row['medicamento']) . '">' . utf8_encode($row['medicamento']) . '</a></div>';
        }
    
    echo $html;
}
