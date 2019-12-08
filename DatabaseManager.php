<?php
class DatabaseManager
{
    private $instance;
    public $link;
    public $mongoManager;
    public $str = "hellow";

    private $host = 'localhost';
    private $user = 'root';
    private $password = 'password';
    private $databaseName = "gdb";

		private $mongoHost = 'localhost:27017';
		private $mongoUser = '';
		private $mongoPassword = '';
		private $mongoDatabaseName = 'homework_3';

    private function __construct()
    {
        $this->link = new mysqli($this->host, $this->user, $this->password, $this->databaseName);
        $this->mongoManager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
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

		public function mongoQuery($collection, $mongoQuery){
			return $this->mongoManager->executeQuery($this->mongoDatabaseName.'.'.$collection, new MongoDB\Driver\Query($mongoQuery))->toArray();
		}

    public function mongoInsert($collection, $mongoDocument){
      $bulk = new MongoDB\Driver\BulkWrite;
      $bulk->insert($mongoDocument);
      $this->mongoManager->executeBulkWrite($this->mongoDatabaseName.'.'.$collection, $bulk);
    }
}
