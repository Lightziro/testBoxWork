<?php
require 'models/Calculate.php';
header("Access-Control-Allow-Origin: *");

if (isset($_GET['number'])) {
    $calculate = new Calculate($_GET['number']);
    $boxes = $calculate->calculate();
    echo json_encode(Calculate::transformToText($boxes));
}
