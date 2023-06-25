<?php 
    namespace App;
    abstract class credentials{   
        // protected $host = '172.16.49.20';
        // private $user = 'sputnik';
        // private $password = 'Sp3tn1kC@';
        protected $dbname = 'campusland';
        protected $host = 'localhost';
        private $user = 'root';
        private $password = '';
        public function __get($name){
            return $this->{$name};
        }
    }
?>