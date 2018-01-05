<?php


class DB extends mysqli{
   
    static $db;
    public $getnuwrows;
     public $readtpage;
    public $startpage;
    public $cuPage;
    public $nexPage;
    public $limit;
    public $total;
    
  public function __contruct()
  {
      parent::__construct();
     
     
      
  }
    
    private function connection() {
        self::$db = new mysqli("localhost", "root", "", "dbkunden");
       return self::$db;
        
        
    }
    public function GetConn() {
        return $this->connection(); 
    }
    
    
    public function query($sql) {
        return $this->connection()->query($sql); 
    }
    
 
 
}










