<?php

require_once __DIR__.'//exercise_1/ArrayMutator.php';


$arrayMutator = new ArrayMutator();
echo "hahah";
echo "<pre>";
// var_dump($arrayMutator->injectAfter(["foo" => 3, "bar" => 1], "foo", "baz", 42));
var_dump($arrayMutator->injectAfter(["foo" => 3, "bar" => 1], "bar", "foo", 42));
