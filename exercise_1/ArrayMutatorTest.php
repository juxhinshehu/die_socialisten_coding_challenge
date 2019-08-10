<?php
declare(strict_types = 1);

require_once __DIR__.'/ArrayMutator.php';

use PHPUnit\Framework\TestCase;

final class ArrayMutatorTest extends TestCase
{
    public function test_injection()
    {
        $arrayMutator = new ArrayMutator();
        $injectedArray = $arrayMutator->injectAfter(["foo" => 3, "bar" => 1], "foo", "baz", 42);

        $this->assertThat($injectedArray,
            $this->equalTo(
                [
                    "foo"=> 3,
                    "baz"=> 42,
                    "bar"=>1
                ]
            )
        );
    }

    public function test_injection_inexistent_after_key()
    {
        $arrayMutator = new ArrayMutator();
        $injectedArray = $arrayMutator->injectAfter(["foo" => 3, "bar" => 1], "inexistent", "baz", 42);

        $this->assertThat($injectedArray,
            $this->equalTo(
                [
                    "foo"=> 3,
                    "bar"=>1,
                    "baz"=> 42
                ]
            )
        );
    }

    public function test_injection_new_key_exists()
    {
        $arrayMutator = new ArrayMutator();
        $injectedArray = $arrayMutator->injectAfter(["foo" => 3, "bar" => 1], "bar", "foo", 42);

        $this->assertThat($injectedArray,
            $this->equalTo(
                [
                    "bar"=>1,
                    "foo"=> 42
                ]
            )
        );
    }
}
