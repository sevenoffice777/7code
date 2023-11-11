<?php 
    // $hostName = 'localhost';
    // $userName = 'root';
    // $password = '';
    // $database = '7TECH';
    
    define('HOSTNAME', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', '7TECH');

    $conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    


    class ConnectHost {
        private $hostName, $userName, $password, $dataBase;
        protected $conn;

        function __construct() {
            $this->hostName = HOSTNAME;
            $this->userName = USERNAME;
            $this->password = PASSWORD;
            $this->dataBase = DATABASE;
            $this->connectHost();
        }

        function connectHost() {
            try {
                $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dataBase); 
                return $this->conn;
            } 
            catch(Exception $error) {
                return $error;
            }
        }
        
    }

?>