<?php

require_once 'TimeTravel.php';

$travel = new TimeTravel();

$com = $travel->setStart(1987, 3, 2, 3, 2, 18);
$fin = $travel->setEnd(2019, 8, 27, 18, 2, 18);

var_dump($com);

var_dump($travel->getTravelInfo($com, $fin));

var_dump($travel->findDate());

$travel->backToTheFutureStepByStep();