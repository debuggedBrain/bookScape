<?php
//initialFile
session_start();
require('../rmq/testRabbitMQClient.php');

error_reporting(E_ALL);
ini_set('display_errors','1');

$user = $_SESSION['user_id'];
$courseInfo = array();//array holding course info
$courseInfo['course1'] = $_POST["course1"];
$courseInfo['course2'] = $_POST["course2"];
$courseInfo['course3'] = $_POST["course3"];
$courseInfo['course4'] = $_POST["course4"];
$courseInfo['course5'] = $_POST["course5"];
$courseInfo['course6'] = $_POST["course6"];
$courseInfo['course7'] = $_POST["course7"];

$response = buildSchedule($courseInfo,$user);

if ($response != false)
{
        header('location:success.php');
}

else
{
        header('location:../index.php');
}
?>

