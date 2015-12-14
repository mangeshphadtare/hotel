<?php 
class Database
{
	private static $instance;
	
	public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new Database();
        }
        
        return self::$instance;
    }
	
	public function isConnected()
    {
        if (!empty($this->link)) {
            return @mysql_ping($this->link);
        } else {
            return false;
        }
    }
	
	public function connect($host, $user, $password, $database=false)
	{
		$this->link = @mysql_connect($host, $user, $password);
		
		 if (!$this->link) 
        {
            throw new Exception('Unable to establish database connection: ' 
                                .mysql_error());
        }

        if ($database) $this->useDatabase($database);
        
        $version = mysql_get_server_info();
        $this->conn_str = "'$database' on '$user@$host' (MySQL $version)";
        
        return $this->link;
	}
	
	public function getConnectionString() 
    {
        return $this->conn_str;
    }
	
	public function useDatabase($database) 
    {
        if (!@mysql_select_db($database, $this->link))
        {
            throw new Exception('Unable to select database: ' . mysql_error($this->link));
        }
    }
	
	public function query($query) 
    {
        $r = @mysql_query($query, $this->link);

        if (!$r) {
            throw new Exception("Query Error: " . mysql_error());
        }
        
        return $r;
    }
    
}

