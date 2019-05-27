<?php
class DbConnection 
{    
    private $host = 'localhost';
    private $username = 'jeremie';
    private $password = '1234';
    private $database = 'crud';
    
    protected $connection;
    
    public function __construct(){

        if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->connection;
    }
}
?>