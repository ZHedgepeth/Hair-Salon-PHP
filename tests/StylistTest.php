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
        protected function tearDown()
        {
            // Client::deleteAll();
            Stylist::deleteAll();
        }

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

        function testgetName()
        {
            //ARRANGE
            $name = "Jilly Jiles";
            $test_stylist = new Stylist($name);

            //ACT
            $result = $test_stylist->getName();

            //ASSERT
            $this->assertEquals($name, $result);
        }

        function testSetName()
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

        function testSave()
        {
            //ARRANGE
            $name= "Jilly Jiles";
            $test_stylist = new Stylist($name);

            //ACT
            $test_stylist->save();
            $result = Stylist::getAll();

            //ASSERT
            $this->assertEquals($test_stylist, $result[0]);
        }

        function testGetAll()
        {
            //Arrange
            $name = "Jilly Jiles";
            $name2 = "James Joyce";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Jilly Jiles";
            $name2 = "James Joyce";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            //Arrange
            $name = "Jilly Jiles";
            $name2 = "James Joyce";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act

            $result = Stylist::find($test_stylist->getId());

            //Assert
            $this->assertEquals($test_stylist, $result);
        }


    }
