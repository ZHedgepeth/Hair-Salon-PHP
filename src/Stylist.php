<?php

    class Stylist
    {
        private $name;
        private $stylist_id;

        function __construct($stylist_name, $stylist_id=null)
        {
            $this->name = $stylist_name;
            $this->stylist_id = $stylist_id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_stylist_name)
        {
            $this->name = (string) $new_stylist_name;
        }

        function getId()
        {
            return $this->stylist_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->getName()}');");
            $this->stylist_id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists");
            $stylists = array();

            foreach ($returned_stylists as $stylist)
            {
                $name = $stylist['name'];
                $stylist_id = $stylist['id'];
                $new_stylist = new Stylist($name, $stylist_id);
                array_push($stylists, $new_stylist);
            }
                return $stylists;
            }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }

        static function find($search_id)
        {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            for ($stylist_index = 0; $stylist_index < count($stylists); $stylist_index++)
            {
                $current_id = $stylists[$stylist_index]->getId();
                if ($current_id === $search_id) {
                    return $stylists[$stylist_index];
                }
            }
            return $found_stylist;
        }

        function getClients()
        {
            $clients = array();
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");

            foreach($returned_clients as $client)
            {
                $client_name = $client['name'];
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($client_name, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
        }



      }



?>
