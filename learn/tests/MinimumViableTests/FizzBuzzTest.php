<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 05/12/2016
 * Time: 13:01
 */

namespace tests\MinimumViableTests;

require './vendor/autoload.php';
require './app/Tests/FizzBuzz.php';

class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{

    public function collectionDataProvider()
    {
        return [
            [
                [1, 2, 3, 4, 6, 7, 9],
                [1, 2, 'Fizz', 4, 'Fizz', 7, 'Fizz']
            ],
            [
                [4, 5, 7, 8, 10],
                [4, 'Buzz', 7, 8, 'Buzz']
            ],
            [
                [14, 15, 30, 31, 45],
                [14,'FizzBuzz','FizzBuzz',31,'FizzBuzz']
            ]
        ];
    }

    /**
     * FizzBuzz Test
     */
    public function testHandlesNonIntegersCorrectly()
    {
         $this->setExpectedException(
         "Exception",
         "Did not receive collection of integers"
         );

         $fizz_buzz = new FizzBuzz();

         $collection = ['A', 1, 'B', 'C', 1.234];

         $fizz_buzz->process($collection);
    }


    public function testHandlesFizzCorrectly()
     {
         $fizz_buzz = new FizzBuzz();

         $collection = [1, 2, 3, 4, 6, 7, 9];

         $expected_result = [1, 2, 'Fizz', 4, 'Fizz', 7, 'Fizz'];

         $result = $fizz_buzz->process($collection);
         $this->assertEquals(

         $expected_result,

         $result,

         "FizzBuzz did correctly find Fizz values"
         );
     }

    public function testHandlesBuzzCorrectly()
    {

        $collection = [4, 5, 7, 8, 10];

        $expected_result = [4, 'Buzz', 7, 8, 'Buzz'];

        $fizz_buzz = new FizzBuzz();

        $result = $fizz_buzz->process($collection);

        $this->assertEquals(

        $expected_result,
        $result,

        "FizzBuzz did not correctly find Buzz values"

         );
     }

    public function testHandlesFizzAndBuzzCorrectly()
    {
        $collection = [14, 15, 30, 31, 45];

        $expected_result = [14, 'FizzBuzz', 'FizzBuzz', 31, 'FizzBuzz'];

        $fizz_buzz = new FizzBuzz();

        $result = $fizz_buzz->process($collection);

        $this->assertEquals(

            $expected_result,

            $result,

            "FizzBuzz did not correctly find FizzBuzz values"
        );

    }
}