<?php
error_reporting(E_ALL ^ E_NOTICE);  
	ini_set('display_errors', "1");
class Database {
    private $link;
    public $filter;
    
 	public function __construct()
	{
	    global $connection;
		$this->link = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT,$charset = 'utf8');
		$this->link->set_charset("utf8");
        if( mysqli_connect_errno() )
        {
            $this->log_db_errors( "Connect failed: %s\n", mysqli_connect_error(), 'Fatal' );
            exit();
        }
	}
	public function __destruct()
	{
		$this->closeconnect();
	}
     
    public function query( $query )
    {
        $query = $this->link->query( $query );
        if( mysqli_error( $this->link ) )
        {
            $this->log_db_errors( mysqli_error( $this->link ), $query, 'Fatal' );
            return false; 
        }
        else
        {
            return true;
        }
        mysqli_free_result( $query );
    }
    
    
   public function count_rows( $query )
    {
        $query = $this->link->query( $query );
        if( mysqli_error( $this->link ) )
        {
            $this->log_db_errors( mysqli_error( $this->link ), $query, 'Fatal' );
            return mysqli_error( $this->link );
        }
        else
        {
            return mysqli_num_rows( $query );
        }
        mysqli_free_result( $query );
    }
    public function todb( $query )
    {
        $query = $this->link->query( $query );
        if( mysqli_error( $this->link ) )
        {
            //$this->log_db_errors( mysqli_error( $this->link ), $query, 'Error!!' );
            return false; 
        }
        else
        {
            return true;
        }
        mysqli_free_result( $query );
    }

    public function to_Obj( $query )
    {
        $row = array();
        $query = $this->link->query( $query );
        if( mysqli_error( $this->link ) )
        {
            $this->log_db_errors( mysqli_error( $this->link ), $query, 'Fatal' );
            return false;
        }
        else
        {
            while( $r = mysqli_fetch_array( $query, MYSQLI_ASSOC ) )
            {
                $row[] = $r;
            }
            mysqli_free_result( $query );
            return $row;   
        }
    }
        
    public function to_Object( $query )
    {
        $row = array();
        $query = $this->link->query( $query );
        if( mysqli_error( $this->link ) )
        {
            $this->log_db_errors( mysqli_error( $this->link ), $query, 'Fatal' );
            return false;
        }
        else
        {
            while( $r = mysqli_fetch_array( $query, MYSQLI_ASSOC ) )
            {
                $row[] = $r;
            }
            mysqli_free_result( $query );
            return $row;   
        }
    }

	public function to_Jsondata( $query )
    {
        $row = array();
        $query = $this->link->query( $query );
        if( mysqli_error( $this->link ) )
        {
            $this->log_db_errors( mysqli_error( $this->link ), $query, 'Fatal' );
            return false;
        }
        else
        {
            while( $r = mysqli_fetch_array( $query, MYSQLI_ASSOC ) )
            {
                $row[] = $r;
            }
			return json_encode($row);
            /* mysqli_free_result( $query );
            return $row;   */
        }
    }
	
    public function closeconnect()
    {
		mysqli_close( $this->link );
	}

   

}
?>