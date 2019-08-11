<?php
declare(strict_types = 1);

require_once __DIR__."/exercise_1/ArrayMutator.php";
require_once __DIR__."/exercise_2/DigitalClock.php";

echo "<pre>";

echo " ----------- Exercise 1 ------------------ <br>";
$arrayMutator = new ArrayMutator();
var_dump($arrayMutator->injectAfter(["foo" => 3, "bar" => 1], "foo", "baz", 42));
// var_dump($arrayMutator->injectAfter(["foo" => 3, "bar" => 1], "bar", "foo", 42));
// var_dump($arrayMutator->injectAfter(["foo" => 3, "bar" => 1], "inexistentKey", "baz", 42));
// var_dump($arrayMutator->injectAfter([], "foo", "baz", 42));


echo " ----------- Exercise 2 ------------------ <br>";
$digitalClock = new DigitalClock();
var_dump($digitalClock->maxEnergyConsumptionTime());