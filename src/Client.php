<?php

    class Client
    {
        private $name;
        private $client_id;
        private $stylist_id;

        function __construct($client_name, $stylist_id=null, $c_id = null)
        {
            $this->name = $client_name;
            $this->stylist_id = $stylist_id;
            $this->client_id = $c_id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_client_name)
        {
            $this->name = (string) $new_client_name;
        }

        function getId()
        {
            return $this->$client_id;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = (int) $new_stylist_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES ('{$this->getName()});', {$this->getStylistId()})");
            $this->client_id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $database_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach ($database_clients as $client)
            {
                $name = $client['name'];
                $client_id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($name, $stylist_id, $client_id);
                $clients[] = $new_client;
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();
            foreach ($clients as $client)
            {
                $client_id = $client->getId();
                if($client_id == $search_id)
                {
                    $found_client = $client;
                }
            }
            return $found_client;
        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        }


    }

?>
