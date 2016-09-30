<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Client.php";
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

        function testGetName()
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

        function testDeleteAll()
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

        function testGetClients()
        {
            //Arrange
            $name = "Jilly Jiles";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $test_stylist_id = $test_stylist->getId();
            print($test_stylist_id);

            $client = "Fantasia";
            $test_client = new Client($client, $test_stylist_id);
            $test_client->save();

            $client2 = "Clarice";
            $test_client2 = new Client($client2, $test_stylist_id);
            $test_client2->save();

            //Act
            $result = $test_stylist->getClients();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function testUpdate()
        {
            //ARRANGE
            $name = "Jilly Jiles";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $new_name = "George Withersby";

            //ACT
            $test_stylist->update($new_name);
            //ASSERT
            $this->assertEquals("George Withersby", $test_stylist->getName());
        }




    }
