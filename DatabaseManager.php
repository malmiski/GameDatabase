<?php
class DatabaseManager
{
    private $instance;
    public $link;
    public $mongoManager;
    public $str = "hellow";

    private $host = 'gdb.cluster-ccsjif6ecw0i.us-east-1.rds.amazonaws.com';
    private $user = 'root';
    private $password = 'password';
    private $databaseName = "gdb";

		private $mongoHost = 'mongodb://';
    private $mongoHosts = ['3.210.130.3:27017', '54.146.137.101:27017', '3.222.55.154:27017'];
    private $currentIndex = 0;
		private $mongoUser = '';
		private $mongoPassword = '';
		private $mongoDatabaseName = 'gdb';

    private function __construct()
    {
        $this->link = new mysqli($this->host, $this->user, $this->password, $this->databaseName);
        $this->mongoManager = new MongoDB\Driver\Manager($this->mongoHost . $this->mongoHosts[$this->currentIndex]);
    }
    public function __destruct()
    {
        if (isset($this->link)) {
            $this->link->close();
        }
				if(isset($this->mongoManager)){
						// Can't close it
				}
    }

    public static function getInstance()
    {
        if (!isset($instance)) {
            $instance = new DatabaseManager();
        }
        return $instance;
    }

    public function query($query)
    {
        return $this->link->query($query);
    }

    public function guid(){
      return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

		public function mongoQuery($collection, $mongoQuery, $next=false){
      if($next){
        $this->currentIndex = ($this->currentIndex + 1) % 3;
        $this->mongoManager = new MongoDB\Driver\Manager($this->mongoHost . $this->mongoHosts[$this->currentIndex]);
      }
      try{
			     $res = $this->mongoManager->executeQuery($this->mongoDatabaseName.'.'.$collection, new MongoDB\Driver\Query($mongoQuery))->toArray();
         }catch(Exception $e){
           return $this->mongoQuery($collection, $mongoQuery, true);
         }
         return $res;
		}

    public function mongoInsert($collection, $mongoDocument, $next=false){
      $bulk = new MongoDB\Driver\BulkWrite();
      $bulk->insert($mongoDocument);
      $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
      if($next){
        $this->currentIndex = ($this->currentIndex + 1) % 3;
        $this->mongoManager = new MongoDB\Driver\Manager($this->mongoHost . $this->mongoHosts[$this->currentIndex]);
      }
      try{
        $res = $this->mongoManager->executeBulkWrite($this->mongoDatabaseName.'.'.$collection, $bulk, $writeConcern);
      }catch(Exception $e){
        return $this->mongoInsert($collection, $mongoDocument, true);
      }
      return $res;
    }
}
?>
