<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     // Client::deleteAll();
        //     Stylist::deleteAll();
        // }

        function testGetId()
        {
            //ARRANGE
            $id = 1;
            $name = "Jilly Jiles";
            $test_stylist = new Stylist($name, $id);

            //ACT
            $result = $test_stylist->getId();

            //ASSERT
            $this->assertEquals($id, $result);
        }

        function testGetName()
        {
            //ARRANGE
            $name = "Jilly Jiles";
            $test_stylist = new Stylist($name);
            $new_name = "James Joyce";

            //ACT
            $test_stylist->setName($new_name);
            $result = $test_stylist->getName();

            //ASSERT
            $this->assertEquals($new_name, $result);
        }




    }
