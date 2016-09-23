<?php

    class Stylist
    {
        private $name;
        private $id;

        function __construct($name, $id=null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->getName()}');");

            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $database_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists");

            $stylists = array();

            if ($database_stylists)
            {
                $database_data = $database_stylists->fetchAll();
                for ($stylist_index = 0; $stylist_index < count($database_data); $stylist_index++)
                {
                    $name = $database_data[$stylists_index]['name'];
                    $id = $database_data[$stylists_index]['id'];
                    $new_stylist = new Stylist($name, $id);
                    $stylists[] = $new_stylist;
                }
                return $stylists;
            }
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
    }


?>
