<?php
//initialFile
session_start();
require('../rmq/testRabbitMQClient.php');

error_reporting(E_ALL);
ini_set('display_errors','1');

$user = $_POST["user"];
$courseInfo = array()//array holding course info
$courseInfo['course1'] = $_POST["course1"];
$courseInfo['time1'] = $_POST["time1"];
$courseInfo['course2'] = $_POST["course2"];
$courseInfo['time2'] = $_POST["time2"];
$courseInfo['course3'] = $_POST["course3"];
$courseInfo['time3'] = $_POST["time3"];
$courseInfo['course4'] = $_POST["course4"];
$courseInfo['time4'] = $_POST["time4"];
$courseInfo['course5'] = $_POST["course5"];
$courseInfo['time5'] = $_POST["time5"];
$courseInfo['course6'] = $_POST["course6"];
$courseInfo['time6'] = $_POST["time6"];
$courseInfo['course7'] = $_POST["course7"];
$courseInfo['time7'] = $_POST["time7"];

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

