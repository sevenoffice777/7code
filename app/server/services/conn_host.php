<?php 
    
    define('HOSTNAME', 'viaduct.proxy.rlwy.net');
    define('USERNAME', 'root');
    define('PASSWORD', '-4h4dgdb45ee4551ab1cdBghbCECcHCa');
    define('DATABASE', 'railway');

    $conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    


    // class ConnectHost {
    //     private $hostName, $userName, $password, $dataBase;
    //     protected $conn;

    //     function __construct() {
    //         $this->hostName = HOSTNAME;
    //         $this->userName = USERNAME;
    //         $this->password = PASSWORD;
    //         $this->dataBase = DATABASE;
    //         $this->connectHost();
    //     }

    //     function connectHost() {
    //         try {
    //             $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dataBase); 
    //             return $this->conn;
    //         } 
    //         catch(Exception $error) {
    //             return $error;
    //         }
    //     }
        
    // }

?>