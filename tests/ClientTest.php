<!-- <?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    // require_once "src/Client.php";
    // require_once "src/Stylist.php";
    //
    // $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    // $username = 'root';
    // $password = 'root';
    // $DB = new PDO($server, $username, $password);
    //
    // class ClientTest extends PHPUnit_Framework_TestCase
    // {
    //     protected function tearDown()
    //     {
    //         Stylist::deleteAll();
    //         Client::deleteAll();
    //     }
    //
    //     function testGetName()
    //     {
    //         //ARRANGE
    //         $stylist_name = "Jilly Jiles";
    //         $test_stylist = new Stylist($stylist_name);
    //         $test_stylist->save();
    //         $stylist_id = $test_stylist->getId();
    //
    //         $name = "Clarice Star";
    //         $test_client = new Client($name, $stylist_id);
    //
    //         //ACT
    //         $result = $test_client->getName();
    //
    //         //ASSERT
    //         $this->assertEquals($name, $result);
    //     }
    //
    //     function testSetName()
    //     {
    //         //ARRANGE
    //         $stylist_name = "Jilly Jiles";
    //         $test_stylist = new Stylist($stylist_name);
    //         $test_stylist->save();
    //         $stylist_id = $test_stylist->getId();
    //
    //         $name = "Clarice Star";
    //         $test_client = new Client($name, $stylist_id);
    //         $new_name = "Fantasia Brown";
    //
    //         //ACT
    //         $test_client->setName($new_name);
    //         $result = $test_client->getName();
    //
    //         //ASSERT
    //         $this->assertEquals($new_name, $result);
    //     }
    //
    //     function testGetId()
    //     {
    //         //ARRANGE
    //         $stylist_name = "Jilly Jiles";
    //         $test_stylist = new Stylist($stylist_name);
    //         $test_stylist->save();
    //         $stylist_id = $test_stylist->getId();
    //
    //         $id = 1;
    //         $name = "Fantasia Brown";
    //         $test_client = new Client($name, $stylist_id, $id);
    //
    //         //ACT
    //         $result = $test_client->getId();
    //
    //         //ASSERT
    //         $this->assertEquals($id, $result);
    //     }
    //
    //     function testGetStylistId()
    //     {
    //         //ARRANGE
    //         $stylist_name = "Jilly Jiles";
    //         $test_stylist = new Stylist($stylist_name);
    //         $test_stylist->save();
    //         $stylist_id = $test_stylist->getId();
    //
    //         $name = "Fantasia Brown";
    //         $test_client = new Client($name, $stylist_id);
    //
    //         //ACT
    //         $result = $test_client->getStylistId();
    //
    //         //ASSERT
    //         $this->assertEquals($stylist_id, $result);
    //     }
    //
    //     function testSetStylistId()
    //     {
    //         //ARRANGE
    //         $stylist_name = "Jilly Jiles";
    //         $test_stylist = new Stylist($stylist_name);
    //         $test_stylist->save();
    //         $stylist_id = $test_stylist->getId();
    //
    //         $stylist_name = "Suzzy Shortcut";
    //         $test_stylist2 = new Stylist($stylist_name);
    //         $test_stylist2->save();
    //         $stylist_id2 = $test_stylist2->getId();
    //
    //         $name = "Maude";
    //         $test_client = new Client($name, $stylist_id);
    //
    //         //ACT
    //         $test_client->setStylistId($stylist_id2);
    //         $result = $test_client->getStylistId();
    //         //ASSERT
    //         $this->assertEquals($stylist_id2, $result);
    //
    //     }
    //     function testSave()
    //     {
    //         //Arrange
    //         $stylist_name = "Jilly Jiles";
    //         $test_stylist = new Stylist($stylist_name);
    //         $test_stylist->save();
    //         $stylist_id = $test_stylist->getId();
    //
    //         $name = "Amelia Earhart";
    //         $test_client = new Client($name, $stylist_id);
    //         $test_client->save();
    //         //Act
    //         $result = Client::getAll();
    //
    //         //Assert
    //         $this->assertEquals($test_client, $result[0]);
    //     }
    //
    //     function testGetAll()
    //     {
    //         //Arrange
    //         $stylist_name = "Jilly Jiles";
    //         $test_stylist = new Stylist($stylist_name);
    //         $test_stylist->save();
    //         $stylist_id = $test_stylist->getId();
    //
    //         $name = "Amelia Earhart";
    //         $name2 = "Maude Gold";
    //         $test_client = new Client($name, $stylist_id);
    //         $test_client->save();
    //         $test_client2 = new Client($name2, $stylist_id);
    //         $test_client2->save();
    //
    //         //Act
    //         $result = Client::getAll();
    //
    //         //Assert
    //         $this->assertEquals([$test_client, $test_client2], $result);
    //     }
    //
    //     function testDeleteAll()
    //     {
    //         //Arrange
    //         $stylist_name = "Jilly Jiles";
    //         $test_stylist = new Stylist($stylist_name);
    //         $test_stylist->save();
    //         $stylist_id = $test_stylist->getId();
    //
    //         $name = "Amelia Earhart";
    //         $name2 = "Maude Gold";
    //         $test_client = new Client($name, $stylist_id);
    //         $test_client->save();
    //         $test_client2 = new Client($name2, $stylist_id);
    //         $test_client2->save();
    //
    //         //Act
    //         Client::deleteAll();
    //         $result = Client::getAll();
    //
    //         //Assert
    //         $this->assertEquals([], $result);
    //     }
    //
    //     function testFind()
    //     {
    //         //Arrange
    //         $stylist_name = "Jilly Jiles";
    //         $test_stylist = new Stylist($stylist_name);
    //         $test_stylist->save();
    //         $stylist_id = $test_stylist->getId();
    //
    //         $name = "Selma Hayak";
    //         $name2 = "Veronica Corninstone";
    //         $test_Client = new Client($name, $stylist_id);
    //         $test_Client->save();
    //         $test_Client2 = new Client($name2, $stylist_id);
    //         $test_Client2->save();
    //
    //         //Act
    //         $result = Client::find($test_Client->getId());
    //
    //         //Assert
    //         $this->assertEquals($test_Client, $result);
    //     }
    //
    //     function testUpdate()
    //     {
    //         //ARRANGE
    //         $name = "Veronica Corninstone";
    //         $id = null;
    //         $test_client = new Client($name, $id);
    //         $test_client->save();
    //
    //         $new_name = "Mrs Veronica Jones";
    //
    //         //ACT
    //         $test_client->update($new_name);
    //         //ASSERT
    //         $this->assertEquals("Mrs Veronica Jones", $test_client->getName());
    //     }
    //
    //     function testDelete()
    //     {
    //         //Arrange
    //         $stylist_name = "Suzzy Shortcut";
    //         $test_stylist = new Stylist($stylist_name);
    //         $test_stylist->save();
    //         $stylist_id = $test_stylist->getId();
    //
    //         $stylist_name2 = "Jilly Jiles";
    //         $test_stylist2 = new Stylist($stylist_name2);
    //         $test_stylist2->save();
    //         $stylist_id2 = $test_stylist2->getId();
    //
    //         $name = "Chelsea Stamp";
    //         $id = null;
    //         $test_client = new Client($name, $stylist_id, $id);
    //         $test_client->save();
    //
    //         $name2 = "Maude";
    //         $test_client2 = new Client($name2, $stylist_id2, $id);
    //         $test_client2->save();
    //
    //
    //         //Act
    //         $test_client->delete();
    //
    //         //Assert
    //         $this->assertEquals([$test_client2], Client::getAll());
    //     }

//
//     }
// ?> -->
