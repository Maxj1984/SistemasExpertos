<?php

$hostLiveN = 'localhost';
$userLiveN = 'root';
$passLiveN = '';
$bdLiveN = 'sys_exp';

$conexion = mysqli_connect($hostLiveN, $userLiveN, $passLiveN, $bdLiveN);
if (!$conexion) {
    die('Could not connect to MySQL: ' . mysqli_error($conexion));
}
