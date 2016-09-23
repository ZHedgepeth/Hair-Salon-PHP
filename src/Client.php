<?php

    class Client
    {
        private $name;
        private $id;
        private $stylist_id;

        function __construct($name, $stylist_id=null, $id=null)
        {
            $this->name = $name;
            $this->id = $id;
            $this->stylist_id = $stylist_id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getStylistId()
        {
            return (int) $this->stylist_id;
        }

        function getId()
        {
            return (int) $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES ('{$this->getName()});', {$this->getStylistId()})");
        }

        static function getAll()
        {
            $clients = array();
            $database_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");

            if ($database_clients)
            {
                $database_data = $database_clients->fetchAll();

                for ($client_index = 0; $client_index < count($database_data); $client_index++);
                {
                    $name = $database_data[$client_index]['name'];
                    $cuisine_id = $database_data[$client_index]['stylist_id'];
                    $id = $database_data[$client_index]['id'];
                    $current_client = new Client($name, $description, $stylist_id, $id);
                    $clients[] = $current_client;
                }
            }

                return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;")
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();
            for ($client_index = 0; $client_index < count($clients); $client_index++)
            {
                $current_id = $clients[$client_index]->getId();
                if($current_id == $search_id){
                    return $clients[$client_index];
                }
            }
            return $found_client;
        }

    }

?>
